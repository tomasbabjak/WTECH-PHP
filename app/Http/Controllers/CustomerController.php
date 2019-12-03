<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\SessionOrder;
use App\SessionCart;
use Session;
use App\Customer;
use App\Product;
use App\Order;
use App\Cart;
use App\Category;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $oldOrder = Session::has('order') ? Session::get('order') : null;
        $order = new SessionOrder($oldOrder);
        $fname = request('fname');
        $lname = request('lname');
        $email = request('email');
        $phone = request('phone');
        $country = request('country');
        $address = request('address');
        $city = request('city');
        $zip = request('zip');
        $token = Session::getId();
        if (in_array($token, DB::table('customers')->pluck('token')->toArray())){
            $customer = Customer::where('token', $token)->first();
        }
        else{
            $customer = Customer::create(['first_name'=>$fname, 'last_name'=>$lname, 'email'=>$email, 'phone'=>$phone, 'street'=>$address, 'city'=>$city, 'country'=>$country, 'zip'=>$zip, 'token'=>$token]);

        }
        $order->addCustomer($customer->id);
        $request->session()->put('order',$order);

        if(Auth::user()){
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $order->addCart($cart_id);
            $cart_items = DB::table('cart_items')->where('cart_id',$cart_id)->get();
        } else{
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new SessionCart($oldCart);
            $cart_items = $cart->items;
        }
        $products = [];
        $sum = 0;
        foreach($cart_items as $cart_item){
            array_push($products,Product::where('id',$cart_item->product_id)->get()->first());
            $sum = $sum + ($cart_item->quantity * Product::where('id',$cart_item->product_id)->get()->first()->price);
        }
        return view('layout.summary')->with('cart_items', $cart_items)->with('customer', $customer)->with('order',$order)->with('sum', $sum);
    }

    public function show(Request $request)
    {
        $oldOrder = Session::has('order') ? Session::get('order') : null;
        $order = new SessionOrder($oldOrder);
        if(Auth::user()){
            $user = Auth::user();
            $cart_id = $user->cart->id;
        
            $customer = Order::create(['cart_id'=>$cart_id, 'user_id'=>$user->id, 'customer_id'=>$order->customer_id, 'transport_id'=>$order->transport_id, 'payment_id'=>$order->payment_id]);
            $affected = DB::update('update cart_items set order_id = ? where cart_id = ?', [$customer->id, $cart_id]);
            $affected = DB::update('update orders set cart_id = null where cart_id = ?', [$cart_id]);
            $affected = DB::update('update cart_items set cart_id = null where cart_id = ?', [$cart_id]);
            
            $user->cart::destroy($cart_id);
            $user->cart = Cart::create([
                'user_id' => $user->id,
            ]);
        }else {
            $customer = Order::create(['customer_id'=>$order->customer_id, 'transport_id'=>$order->transport_id, 'payment_id'=>$order->payment_id]);
            $cart = new SessionCart(null);
        }

        $order = new SessionOrder(null);
        $products1 = Product::inRandomOrder()->take(6)->get();
        $products2 = Product::inRandomOrder()->take(6)->get();
        $products3 = Product::inRandomOrder()->take(6)->get();
        $categories = Category::all();
        $success = 'Vasa objednavka bola spracovana';
        return view('layout.landing-page')->with('success', $success)->with('products1', $products1)->with('products2', $products2)->with('products3', $products3)->with('categories', $categories);
    }
}
