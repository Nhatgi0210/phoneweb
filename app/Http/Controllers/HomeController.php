<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MainImage;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

use App\Models\Image;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);                                                                                                                                                                                                                                                                                                                                                      
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view("home.index",compact('hotProducts','cheapProducts','brands','categories'));
    }
    public function upImage(Request $request){
        
        $product =  Product::findOrFail($request->input('product_id'));

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        foreach($request->file('images') as $imageFile ){
            $path = $imageFile->store('productImages','public');
            $image = new Image();
            $image->product_id = $product->id;
            $image->path = $path;
            $image->save();
        }
        $mainImageFile = $request->file('main_image');
        $path = $mainImageFile->store('productImages','public');
        $image2 = new Image();
        $image2->product_id = $product->id;
        $image2->path = $path;
        $image2->save();

        $product->main_image_path = $path;
        $product->save();

        return back();
    }
    public function image(){
        $products = Product::all();
        return view('image')->with('products',$products);
    }
    public function test2()
    {
        return view('home.test2');
    }
    // so sanh
    public function sosanh()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
<<<<<<< HEAD
        $categories = Category::all();
        return view('home.sosanh', compact('hotProducts', 'cheapProducts', 'brands','categories'));
=======
        $categories = Category::all();  // Lấy tất cả danh mục
    
        return view('home.sosanh', compact('hotProducts', 'cheapProducts', 'brands', 'categories'));  // Truyền 'categories' vào view
>>>>>>> 35af41302dc656d2194f7b7d6c20864d21d4d994
    }
    
    //shopping-cart
    public function dangki()
    {
        return view('home.formdangki');
    }
    
    public function inforProduct()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.inforProduct', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function shopping_cart()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.shopping-cart', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function appadmin()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.appadmin', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function admin_thongtin()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.admin_thongtin', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function admin()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.admin', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function admin_manage_product()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.admin_manage_product', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function admin_manage_user()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.admin_manage_user', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function editproduct()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.edit_product', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    

}   
