<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Product;
use Session;
use App\SessionCart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            dd($session_id = Session::getId());
            $oldCart = Session::has('cart') ? Session::get('cart') : [];
            $cart = new SessionCart($oldCart);
            return view('layout.cart')->with('products', $cart->items);
        }
        else{
            $user = Auth::user();
            dd($session_id = Session::getId());
            $cartId = $user->cart->id;
            $cart_items = DB::table('cart_items')->where('cart_id',$cartId)->get();
            $products = [];
            foreach($cart_items as $cart_item){
                array_push($products,Product::where('id',$cart_item->product_id)->get()->first());
            }
            return view('layout.cart')->with('products', $products);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $task = Cart::create(['user_id' => $userId]);
    }

}
