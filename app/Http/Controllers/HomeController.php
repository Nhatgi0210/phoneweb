<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);                                                                                                                                                                                                                                                                                                                                                      
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        return view("home.index",compact('hotProducts','cheapProducts','brands'));
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
