<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommonController extends Controller
{

    protected $order_id = null;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function registerUser()
    {
        $data = DB::select("select * from item_details where status=1");
        return view('auth.register', ['items' => $data]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */


    public function packageView()
    {
        $data = DB::select("select * from item_details where status=1");
        return view('package-add', ['items' => $data]);
    }

    /**
     * @return int|string
     */

    protected function getorder_id()
    {
        $data = DB:: select("SELECT m.order_id  from  user_order m ORDER BY m.id DESC LIMIT 1");
        if ($data == []) {
            $this->order_id = '1';
        } else {
            $fields = explode('OR', $data[0]->order_id);
            $this->order_id = (int)$fields[1] + 1;
        }

        return $this->order_id;
    }

    public function packageCreate(Request $request)
    {

        $packages = $request->input('packages');
        $fullamount = $request->input('fullamount');
        $user = $request->input('user');
        $array = json_decode($packages, true);
        $size = sizeof($array);
        $order_idfr = 'OR' . $this->getorder_id();

        DB::beginTransaction();
        try {
            $user = User::where('id', $user)->get();

            $user_order = array(
                'order_id' => $order_idfr,
                'user_id' => $user[0]->user_id,
                'fullamount' => $fullamount
            );
            $query = DB::table('user_order')->insert($user_order);

            $content = "Your order has been placed now. your Order Id is :$order_idfr. Order Full Amount is LKR $fullamount. <br> Thank you.<br> Management Team ";
            $subject = "About Your Order Details";
            $this->mailfunction($user[0]->firstname, $content, $user[0]->email, $subject);

            for ($i = 0; $i < $size; $i++) {
                $id = $array[$i]["id"];
                $itemqty = $array[$i]["itemqty"];
                $itemtotamount = $array[$i]["itemtotamount"];

                $order_item = array(
                    'item_id' => $id,
                    'order_id' => $order_idfr,
                    'item_qty' => $itemqty,
                    'item_amount' => $itemtotamount,
                );
                $res = DB::table('order_item')->insert($order_item);
                if ($res == 1) {
                    $array2 = array(
                        "code" => 200,
                        "message" => "Order Success",
                        "data" => []
                    );
                } else {
                    DB::rollback();
                    $array2 = array(
                        "code" => 500,
                        "message" => "Order Data Failed",
                        "data" => []
                    );
                }

            }

        } catch (Exception $e) {
            DB::rollback();
            $array2 = array(
                "code" => 501,
                "message" => "Order Exception Failed",
                "data" => []
            );
        }
        DB::commit();
        return response()->json($array2);
    }

    /**
     * @param $name
     * @param $content
     * @param $email_id
     * @param $subject
     */

    public function mailfunction($name, $content, $email_id, $subject)
    {

        Mail::send([], [], function ($message) use ($name, $email_id, $content, $subject) {
            $message->to($email_id, $name)
                ->subject($subject)
                ->setBody($content, 'text/html');
            $message->from('testqa.uvin@gmail.com', 'DIGICO LABS (pvt) LTD');
        });
    }
}
