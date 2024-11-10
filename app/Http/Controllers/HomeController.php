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
}
