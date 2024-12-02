<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductOnCart;
use Illuminate\Http\Request;
use Redirect;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        $product_id = $request->input('product_id');
        $user_id = $request->input('user_id');
        $product_on_cart = new ProductOnCart();
        $product_on_cart->product_id = $product_id;
        $product_on_cart->user_id = $user_id;
        $product_on_cart->save();
        
        return response("Thêm vào giỏ hàng thành công!");
    }
    public function shopping_cart()
    {
        $now = now(); // Lấy thời gian hiện tại (bao gồm ngày, giờ, phút, giây)
        $orderCode = Str::random(6);
        $brands = Brand::all();
        $categories = Category::all();
        $cart = auth()->user()->Product;
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
        return view('home.shopping-cart', compact( 'brands','categories','cart','user','now','orderCode'));
    }
    public function updateQuantity(Request $request){
      

        // Validate dữ liệu từ AJAX
        $request->validate([
            'poc_id' => 'required|integer|exists:product_on_carts,id',
            'quantity' => 'required|integer|min:0',
        ]);

        try {
        
            $productOnCart = ProductOnCart::findOrFail($request->poc_id);

        
            $productOnCart->quantity = $request->quantity;
            $productOnCart->save();

        
            return response()->json([
                'success' => true,
                'message' => 'Số lượng đã được cập nhật thành công!'
            ]);
            } catch (\Exception $e) {
            // Trả về phản hồi lỗi
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật số lượng!'
            ], 500);
        
        }

    }
    public function delete(Request $request){
        
        $poc = ProductOnCart::find($request->poc_id);
        $poc->delete();

        return back()->with('poc',$request->poc_id);
    }
}
