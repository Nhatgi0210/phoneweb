<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đánh giá.');
        }

        // Kiểm tra xem người dùng đã đánh giá sản phẩm này chưa
        $existingRating = Rating::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existingRating) {
            return redirect()->route('products.show', $productId)->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
        }

        // Lưu đánh giá sao vào bảng ratings
        Rating::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'rating' => $request->rating,
        ]);

        return redirect()->route('products.show', $productId)->with('success', 'Đánh giá của bạn đã được ghi nhận!');
    }
}
