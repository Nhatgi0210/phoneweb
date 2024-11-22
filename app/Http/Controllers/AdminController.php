<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function appadmin()
    {
        $hotProducts = Product ::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand ::all();
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
