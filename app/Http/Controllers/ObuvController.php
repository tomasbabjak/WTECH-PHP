<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

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
    
    public function list($page) {  
        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);
            
        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'id');
            
        // get descending from query parameters (after ?), if not set => false 
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        
        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
              
            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        // error handling is up to you!!! ;)
        return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
    }

    public function store(Request $request)
    {
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);
        */
        $label = strtolower($request->brand) . "-" . strtolower($request->name);
        $label = str_replace(" ", "-", $label);
        $product = Product::create(['name' => $request->name,'label' => $label, 'detail' => $request->description, 'brand' => $request->brand, 'price' => (float)$request->price, 'in_stock' => intval($request->in_stock), 'category_id' =>intval($request->category_id)]);
        return response()->json(['id' => $product->id]);
    }

    public function edit(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);  
        */
            
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->brand = $request->brand;
        $product->in_stock = (int)$request->in_stock;
        $product->price = (float)$request->price;
        $product->category_id = (int)$request->category_id;
        $product->save();
    }
    
    public function categories()
    {
        $categories = Category::all();        
        $arr = [];
        foreach ($categories as $category) 
        {
            array_push($arr, array(
                'label' => $category->name,
                'value' => $category->id
            ));
        }
        return response()->json($arr);
    }

}
