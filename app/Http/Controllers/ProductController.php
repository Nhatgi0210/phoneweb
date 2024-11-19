<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('home.product',compact('brands','products','categories'));
    }
    public function showProductsByBrandName($brandName)
    {
        
        $brand = Brand::where('name', $brandName)->with('products')->first();
        $brands = Brand::all();
        $categories = Category::all();
        $products = ($brand->products)->where('category_id',1);
        if (isset($brand)) {
           return view('home.product', compact('products','brands','brand','categories') );
        } 
    }
    public function showProductsByCategory($name)
    {
    
        $category = Category::where('name', $name)->firstOrFail();
        $brands = Brand::all();
        $products = $category->products;
        $categories = Category::all();
        return view('home.product', compact('products','brands','categories','category') );
        
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Hoặc dùng các query khác nếu cần
        return view('products.show', compact('product'));
    }


}
