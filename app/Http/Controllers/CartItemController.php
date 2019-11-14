<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
use App\SessionCart;
use Session;

class CartItemController extends Controller
{

    public function index()
    {
        
    }

    public function show()
    {
        
    }

    public function store(Request $request)
    {
        if(Auth::guest()){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new SessionCart($oldCart);
            $product = Product::where('id', $request->id)->get()->first();
            //dd($product, $product->id);
            $cart->add($product, $product->id);
            $request->session()->put('cart',$cart);
            return view('layout.cart')->with('products', $cart->items);
        }
        else{
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $cart_items = DB::table('cart_items')->where('cart_id',$cart_id)->get();
            $products = [];
            $ids = [];
            foreach($cart_items as $cart_item){
                array_push($ids, $cart_item->product_id);
                array_push($products,Product::where('id',$cart_item->product_id)->get()->first());
            }
            if(!(in_array ($request->id, $ids))){
                $cartitem = CartItem::create(['product_id'=>$request->id, 'quantity' => 1, 'cart_id'=>$cart_id]);
                array_push($products, Product::where('id',$request->id)->get()->first());
            }
            return view('layout.cart')->with('products', $products);
        }
    }

    public function delete(Request $request, $id)
    {
        if(Auth::guest()){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new SessionCart($oldCart);
            $product = Product::where('id', $id)->get()->first();
            $products = $cart->items;
            if(($key = array_search($product, $products)) !== false){
                unset($products[$key]);
            }
            $cart->replace($products);
            $request->session()->put('cart',$cart);
            return view('layout.cart')->with('products', $cart->items);

        }else{
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $cartItem = CartItem::where('product_id',$id)->where('cart_id',$cart_id)->get()->first();
            CartItem::destroy($cartItem->id);
            return back()->withInput();
        }
    }

    public function update($id)
    {
        if(Auth::guest()){
        }else{
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $cartItem = CartItem::where('product_id',$id)->where('cart_id',$cart_id)->get()->first();
            $cartItem->quantity = request()->arr;
            $cartItem->save();
            return back();
        }
    }

}
