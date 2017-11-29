<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Type;
use App\Brand;

class PagesController extends Controller
{
    public function index(Request $request)
     {
        $products = Product::all();

        if($request->has('category')){
            
            $category_id = Category::where('cat_name',$request->category)->get()->first()->id;
            
            $products = Product::where('category_id',$category_id)->get();
            return view('pages.homeshop')->with('products',$products);
        }

        if($request->has('type')){
            
            $type_id = Type::where('name',$request->type)->get()->first()->id;
            
            $products = Product::where('type',$type_id)->get();
            return view('pages.homeshop')->with('products',$products);
        }

        if($request->has('brand')){
            
            $brand_id = Brand::where('name',$request->brand)->get()->first()->id;
            
            $products = Product::where('brand',$brand_id)->get();

            return view('pages.homeshop')->with('products',$products);
        }

        if($request->has('all')){

            $products = Product::all();
            return view('pages.homeshop')->with('products',$products);
        }


        return view('pages.home')->with('products',$products);
    }

    public function search(Request $request){

        (string)$keyword = $request->search;
        
       $products = Product::where('product_name', 'like', '%'.$keyword.'%')->get();

       return view('pages.homeshop')->with('products',$products);
    }
}
