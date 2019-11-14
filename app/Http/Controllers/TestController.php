<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class TestController extends Controller
{
    public function index()
    {
        $products1 = Product::inRandomOrder()->take(6)->get();
        $products2 = Product::inRandomOrder()->take(6)->get();
        $products3 = Product::inRandomOrder()->take(6)->get();
        $categories = Category::all();
        return view('layout.landing-page')->with('products1', $products1)->with('products2', $products2)->with('products3', $products3)->with('categories', $categories);
        
    }

    public function show($label)
    {
        $category = Category::where('label', $label)->firstOrFail();
        $products = Product::where('category_id', $category->id)->take(12);
        $categories = Category::all();
        $brands = Product::where('category_id', $category->id)->get()->pluck('brand')->unique();

        if(request('arr') !== null){
            $arr = array(request('arr'));
            $products = $products->whereIn('brand',$arr[0]);
        }

        if(request()->sort == 'low'){
            $products = $products->orderBy('price')->paginate(9);
        } elseif (request()->sort == 'high'){
            $products = $products->orderBy('price','desc')->paginate(9);
        } elseif (request()->sort == 'az'){
            $products = $products->orderBy('name',)->paginate(9);
        } elseif (request()->sort == 'za'){
            $products = $products->orderBy('name','desc')->paginate(9);
        } else {
            $products = $products->paginate(9);
        }
        return view('layout.obuv')->with('brands', $brands)->with('products', $products)->with('categories', $categories)->with('category', $category);
    }
}
