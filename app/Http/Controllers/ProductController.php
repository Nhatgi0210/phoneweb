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
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::findOrFail($id); 
        $config = $product->phoneConfig;
        $product = Product::find($id);  // Lấy sản phẩm theo ID
$brand = $product->brand;  // Truy cập thông tin thương hiệu của sản phẩm

// $relatedProducts = $brand->products->where('id', '!=', $id); // Loại trừ sản phẩm hiện tại
$relatedProducts = Product::where('brand_id', $product->brand_id)
    ->where('category_id', $product->category_id)
    ->where('id', '!=', $product->id)  // Loại bỏ sản phẩm hiện tại
    ->get();
        return view('home.inforProduct', compact('product','brands','categories','config','relatedProducts'));
    }
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                   ->where('category_id', 1)
                   ->pluck('name');
        
        if ($products->isEmpty()) {
            return response('No products found');
        }
        $html = '';
        foreach ($products as $product) {
            $html .= '<li class="suggestion-item">' . htmlspecialchars($product) . '</li>';
        }
       
       
        return response($html);
    }
    public function compare(Request $request){
        $brands = Brand::all();
        $categories = Category::all();
        $phone1 = Product::where('name',$request->input('phone1'))->first();
        $phone2 = Product::where('name',$request->input('phone2'))->first();
        $config1 = $phone1->phoneConfig;
        $config2 = $phone2->phoneConfig;
        return view('home.compare_result', compact('config1','config2','phone1','phone2','brands','categories'));
    }

    public function showsearch(Request $request){
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::where('name',$request->input('phonea'))->first();
        // $product = Product::findOrFail($id); 
        $config = $product->phoneConfig;
       
        return view('home.inforProduct', compact('config','product','brands','categories'));
    }
}
