<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loggedUserId = Auth::id();
        $data=DB::select("select * from users u,user_order uo,order_item oi,item_details ie where u.user_id=uo.user_id and uo.order_id=oi.order_id and oi.item_id=ie.id and u.id='{$loggedUserId}'");
        return view('home')->with('packages',$data);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }


}
