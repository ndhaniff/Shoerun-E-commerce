<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Product;
use App\Gallery;
use App\Category;
use App\Type;
use App\Brand;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();

        $attributes = array(
            'categories' => $categories,
            'types' =>  $types,
            'brands' => $brands
        );

        return view('products.create')->with('attributes',$attributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    public function save(Request $request){

        //  saving products data to db
        $product = new Product;
        $product->user_id = Auth::id(); 
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('description');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->type = $request->input('types');
        $product->sku = $request->input('sku');
        $product->stock = $request->input('stock');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->shipping = $request->input('shipping_details');
        $product->in_stock = true;
        $product->save();
        
        $files = $request->file('product_img');
        if(!empty($files)) :
            foreach($files as $file) : 
                $filenameWithExt = $file->getClientOriginalName();
                //get just filename
                $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $file->getClientOriginalExtension();
                //filename to store
                $fileNameToStore =$filename.'_'.time().'.'.$extension;
                //save image
                $path = $file->storeAs('public/productimg', $fileNameToStore);

                $gallery = new Gallery;
                $gallery->product_id = $product->id;
                $gallery->original_name = $filenameWithExt;
                $gallery->name = $fileNameToStore;
                $gallery->save();
            endforeach;
        endif;

        return response()->json(['success'=> 'true','redirect' => '/products/single/1']);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.single')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
