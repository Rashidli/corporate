<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Customer;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function login()
    {
        return view('login');

    }

    public function register()
    {
        return view('register');
    }

    public function home()
    {

        $customer_count = Customer::all()->count();
        $act_count = Act::all()->count();
        $payment_count = Payment::all()->count();
        $meeting_count = Meeting::all()->count();
        return view('home',compact('customer_count','act_count','payment_count','meeting_count'));

    }


}
