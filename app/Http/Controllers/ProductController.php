<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        return view('home.product',compact('brands','products'));
    }
    public function showProductsByBrandName($brandName)
    {
        
        $brand = Brand::where('name', $brandName)->with('products')->first();
        $brands = Brand::all();
        if (isset($brand)) {
           return view('home.product', ['products' => $brand->products, 'brands' => $brands,'brand' => $brand]);
        }

        
    }


}
