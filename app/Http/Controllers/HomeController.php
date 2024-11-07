<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hotProducts = Product::whereHas("Tag",function($query){
            $query->where("product_tag.end_date",">",Carbon::now())
            ->where("tags.id",1);
        })->get();
        return view("home.index")->with("hotProducts", $hotProducts->take(4));
    }
}
