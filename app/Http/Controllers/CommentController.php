<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, $productId)
{
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'product_id' => $productId,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Bình luận đã được thêm!');
}
public function __construct()
{
    $this->middleware('auth');
}



public function store2(Request $request)
{
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận.');
    }

    // Lấy thông tin từ request
    $userId = auth()->id(); // ID của người dùng đã đăng nhập
    $productId = $request->input('product_id'); // ID sản phẩm
    $content = $request->input('content'); // Nội dung bình luận

    // Thêm bình luận vào database
    \DB::table('comments')->insert([
        'user_id' => $userId,
        'product_id' => $productId,
        'content' => $content,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Trả về thông báo thành công
    return redirect()->back()->with('success', 'Bình luận của bạn đã được thêm.');
}
// Trong ProductController.php

public function showCmt($product_id)
{
    // Lấy sản phẩm theo ID
    $product = Product::findOrFail($product_id);

    // Lấy tất cả bình luận của sản phẩm này (có thể sắp xếp theo thời gian tạo)
    $comments = Comment::where('product_id', $product_id)
                       ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo
                       ->get();

    // Trả về view với thông tin sản phẩm và bình luận
    return view('home.inforProduct', compact('product', 'comments'));
}


}
