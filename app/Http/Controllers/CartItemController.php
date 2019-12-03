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
            $item = new CartItem(['product_id'=>$request->id, 'quantity' => 1]);
            $cart->add($item, $product->id);
            $request->session()->put('cart', $cart);

            $ids = [];
            $products = [];
            foreach($cart->items as $cart_item){
                array_push($ids, $cart_item->product_id);
                array_push($products,Product::where('id',$cart_item->product_id)->get()->first());
            }
            return view('layout.cart')->with('products', $products)->with('items', $cart->items);
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
            $cart_items = DB::table('cart_items')->where('cart_id',$cart_id)->get();
            return view('layout.cart')->with('products', $products)->with('items', $cart_items);
        }
    }

    public function delete(Request $request, $id)
    {
        if(Auth::guest()){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new SessionCart($oldCart);
            $items = $cart->items;
            foreach($cart->items as $cart_item){
                if($cart_item['product_id'] == $id){
                    $item = $cart_item;
                }
            }
            if(($key = array_search($item, $items)) !== false){
                unset($items[$key]);
            }
            $cart->replace($items);
            $request->session()->put('cart',$cart);
            return view('layout.cart')->with('products', $cart->items)->with('items', $cart->items);

        }else{
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $cartItem = CartItem::where('product_id',$id)->where('cart_id',$cart_id)->get()->first();
            CartItem::destroy($cartItem->id);
            $cart_items = DB::table('cart_items')->where('cart_id',$cart_id)->get();
            return view('layout.cart')->with('items', $cart_items);
        }
    }

    public function update(Request $request, $id)
    {
        if(Auth::guest()){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new SessionCart($oldCart);
            foreach($cart->items as $cart_item){
                if($cart_item['product_id'] == $id){
                    $cart_item['quantity'] = request()->arr;
                }
            }
            $request->session()->put('cart', $cart);
            return view('layout.cart')->with('items', $cart->items);
        }else{
            $user = Auth::user();
            $cart_id = $user->cart->id;
            $cartItem = CartItem::where('product_id',$id)->where('cart_id',$cart_id)->get()->first();
            $cartItem->quantity = request()->arr;
            $cartItem->save();
            $cart_items = DB::table('cart_items')->where('cart_id',$cart_id)->get();
            return view('layout.cart')->with('items', $cart_items);
        }
    }

}
