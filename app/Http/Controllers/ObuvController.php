<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ObuvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($label)
    {
        $product = Product::where('label', $label)->firstOrFail();
        $category = Category::where('id', $product->category_id)->firstOrFail();
        $categories = Category::all();
        
        return view('layout.obuv')->with('products', $products)->with('category', $category)->with('categories', $categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($label)
    {
        $product = Product::where('label', $label)->firstOrFail();
        $products = Product::inRandomOrder()->take(9)->get();
        $categories = Category::all();

        return view('layout.product')->with('product', $product)->with('products', $products)->with('categories', $categories);
    }

}
