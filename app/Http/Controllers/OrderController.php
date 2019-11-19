<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\SessionOrder;
use Session;
use App\Transport;
use App\Payment;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $oldOrder = Session::has('order') ? Session::get('order') : null;
        $order = new SessionOrder($oldOrder);
        $transports = Transport::all();
        $payments = Payment::all();

        if(Auth::user()){
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $order->addCart($cart_id);
        }
        $request->session()->put('order',$order);
        return view('layout.transport')->with('transports', $transports)->with('payments', $payments);
    }

    public function show(Request $request)
    {
        $oldOrder = Session::has('order') ? Session::get('order') : null;
        $order = new SessionOrder($oldOrder);

        $radio_transport = request('radio1');
        $radio_payment = request('radio2');
        $order->addTransport($radio_transport[0]);
        $order->addPayment($radio_payment[0]);
        
        if(Auth::user()){
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $order->addCart($cart_id);
        }
        $request->session()->put('order',$order);
        return view('layout.customer');

    }
}
