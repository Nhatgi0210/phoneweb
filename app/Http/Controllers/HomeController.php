<?php

namespace App\Http\Controllers;
use App\Models\Brand;
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
        return view("home.index",compact('hotProducts','cheapProducts','brands'));
    }
    public function upImage(Request $request){
        
        $products =  Product::findOrFail($request->input('product_id'));

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        foreach($request->file('images') as $imageFile ){
            $path = $imageFile->store('productImages','public');
            $image = new Image();
            $image->product_id = $products->id;
            $image->path = $path;
            $image->save();
        }
        $mainImageFile = $request->file('main_image');
        $path = $mainImageFile->store('productImages','public');
        $image2 = new Image();
        $image2->product_id = $products->id;
        $image2->path = $path;
        $image2->save();

        $mainImage = new MainImage();
        $mainImage->product_id = $products->id;
        $mainImage->image_id = $image2->id;
       
        try{
            $mainImage->save();
            $message = '<span style="color: green">UPLOAD THÀNH CÔNG!</span>';
        }
        catch(Exception $e){
            $message = '<span style="color: red">LỖI:'.$e->getMessage().'</span>';
        }
        
        
        
        return back()->with('message',$message);
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
        return view('home.sosanh', compact('hotProducts', 'cheapProducts', 'brands'));
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
        return view('home.inforProduct', compact('hotProducts', 'cheapProducts', 'brands'));
    }
    public function shopping_cart()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        return view('home.shopping-cart', compact('hotProducts', 'cheapProducts', 'brands'));
    }
    

}   
