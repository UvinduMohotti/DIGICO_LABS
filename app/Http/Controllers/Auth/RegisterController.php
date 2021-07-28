<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'nic' => ['required', 'string', 'max:255'],
            'mobilenumber' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected $user_id = null;
    protected $order_id = null;

    /**
     * @return int|string
     */

    protected function getuser_id()
    {
        $data = DB:: select("SELECT m.user_id  from  users m ORDER BY m.id DESC LIMIT 1");
        if ($data == []) {
            $this->user_id = '1';
        } else {
            $fields = explode('U', $data[0]->user_id);
            $this->user_id = (int)$fields[1] + 1;
        }

        return $this->user_id;
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $packages = $data['packages'];
        $fullamount = $data['fullamount'];
        $array = json_decode($packages, true);
        $size = sizeof($array);
        $useridfr = 'U' . $this->getuser_id();
        $order_idfr = 'OR' . $this->getorder_id();

        $user_order = array(
            'order_id' => $order_idfr,
            'user_id' => $useridfr,
            'fullamount' => $fullamount
        );
        $query = DB::table('user_order')->insert($user_order);

        $content="Your order has been placed now. your Order Id is :$order_idfr  & Your order Full Amount is $fullamount <br> Thank you.<br> Management Team ";
        $subject="About Your Order Details";
        $this->mailfunction($data['firstname'],$content,$data['email'],$subject);

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
            DB::table('order_item')->insert($order_item);

        }
        return User::create([
            'user_id' => $useridfr,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'nic' => $data['nic'],
            'mobilenumber' => $data['mobilenumber'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     * @return int|mixed
     * @throws \Illuminate\Validation\ValidationException
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: 1;
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
