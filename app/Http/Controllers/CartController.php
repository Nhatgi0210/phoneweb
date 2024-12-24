<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductOnCart;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
// use App\Notifications\OrderStatusUpdated;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdated;
use Illuminate\Support\Facades\Log;
use Session;
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

    //hàm riêg cho đặt hàng hấn xóa cái giỏ hàg :
    public function deleteAll(Request $request)
{
    ProductOnCart::truncate(); // Xóa tất cả các bản ghi trong bảng ProductOnCart

    // Trả về trang trước đó và gửi theo thông báo rằng giỏ hàng đã được xóa
    return back()->with('success', 'Giỏ hàng đã được xóa.');
}

   public function placeOrder(Request $request)
{
    // Giải mã dữ liệu giỏ hàng từ client
    $cart = json_decode($request->cart, true);
    $quantities = $request->input('quantities', []);
    if (is_array($cart) && !empty($cart)) {
        // Tính tổng tiền cho đơn hàng
        // $quantities = $request->input('quantities'); 
        $totalPrice = $request->input('total');
        // foreach ($cart as $product) {
        //     // Tổng tiền đơn hàng dựa trên giá giảm và số lượng
        //     $totalPrice += $product['discount_price'] * $product['pivot']['quantity']; 
        // }

        // Lưu đơn hàng vào bảng orders
        $order = new Order();
        $order->user_id = auth()->id();  // Lấy ID người dùng đã đăng nhập
        $order->email = auth()->user()->email; // Email của khách hàng
        $order->total_price = $totalPrice;
        $order->address = session('address');
        $order->phone = session('phone');
        $order->status = 'pending'; // Trạng thái đơn hàng là 'pending'
        $order->save();

        // Lưu chi tiết đơn hàng vào bảng order_items
        foreach ($cart as $product) {
            $orderItem = new OrderItem();  // Sử dụng bảng order_item
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product['id'];
            $orderItem->quantity =$quantities[$product['id']] ?? 1;
            $orderItem->price = $product['discount_price']; // Lưu giá sản phẩm khi đặt hàng
            $orderItem->save();
        }

        // Xóa toàn bộ giỏ hàng của người dùng
        ProductOnCart::where('user_id', auth()->id())->delete(); 

        // Gửi email thông báo cho khách hàng
        // Tạo đối tượng mailable và gửi email
        // Mail::to($order->email)->send(new OrderStatusUpdated($order));

        // Chuyển hướng hoặc trả về phản hồi
        return redirect()->route('donhang')->with('success', 'Đặt hàng thành công! Chúng tôi đã gửi thông báo qua email cho bạn.');
    }

    // Nếu giỏ hàng không hợp lệ
    return redirect()->back()->withErrors('Giỏ hàng không hợp lệ');
}
    
    
    
    
    
    

    public function show($orderId)
    {
        // Tìm đơn hàng theo ID và lấy các thông tin sản phẩm liên quan
        $order = Order::with('items.product')->findOrFail($orderId);
    
        // Truyền biến $order vào view (view có thể là 'admin.orders.show' hoặc bất kỳ view nào bạn muốn)
        return view('home.admin_duyet', compact('order'));
    }
    public function showOrders()
{
    // Lấy tất cả các đơn hàng chưa duyệt
    $orders = Order::where('status', 'pending')->get();

    return view('admin.orders.index', compact('orders'));
}

  // OrderController.php
public function createOrder(Request $request)
{
    // Lấy thông tin từ form
    $user = auth()->user();
    $orderCode = $request->input('order_code');
    $totalPrice = $request->input('total_price');
    $cart = json_decode($request->input('cart'), true);
    $shippingFee = 50000; // Giả sử có phí vận chuyển
    $discount = 1000000;  // Giả sử có giảm giá

    // Tạo đơn hàng mới với các thông tin từ hóa đơn
    $order = Order::create([
        'user_id' => $user->id,
        'order_code' => $orderCode,
        'total_price' => $totalPrice,
        'shipping_fee' => $shippingFee,
        'discount' => $discount,
        'status' => 'pending', // Trạng thái "pending" cho admin duyệt
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Lưu các sản phẩm từ giỏ hàng vào bảng order_items
    foreach ($cart as $product) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product['id'],
            'quantity' => $product['quantity'],
            'price' => $product['price'],
        ]);
    }

    // Chuyển hướng đến trang admin để duyệt đơn hàng (hoặc gửi email cho admin)
    return redirect()->route('admin.orders.index')->with('message', 'Đơn hàng đã được tạo và chờ duyệt!');
}

// public function approve($id)
//     {
//         $order = Order::findOrFail($id);
//         $order->status = 'approved'; // Cập nhật trạng thái thành "đã duyệt"
//         $order->save();

//         return redirect()->back()->with('success', 'Đơn hàng đã được duyệt.');
//     }

//     public function reject($id)
//     {
//         $order = Order::findOrFail($id);
//         $order->status = 'rejected'; // Cập nhật trạng thái thành "không duyệt"
//         $order->save();

//         return redirect()->back()->with('success', 'Đơn hàng đã bị từ chối.');
//     }
public function approve($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'approved'; // Cập nhật trạng thái thành "đã duyệt"
    $order->save();

    // Gửi email thông báo trạng thái đơn hàng đã được duyệt
    try {
        Mail::raw('Đơn hàng của bạn đã được duyệt.', function($message) use ($order) {
            $message->to($order->email) // Email của khách hàng
                    ->subject('Thông báo trạng thái đơn hàng');
        });

        return redirect()->back()->with('success', 'Đơn hàng đã được duyệt và thông báo đã được gửi đến khách hàng.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors('Có lỗi xảy ra khi gửi email: ' . $e->getMessage());
    }
}



public function reject($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'rejected'; // Cập nhật trạng thái thành "không duyệt"
    $order->save();

    // Gửi email cho khách hàng và xử lý lỗi nếu có
    try {
        Mail::to($order->email)->send(new OrderStatusUpdated($order));
        // Nếu không có lỗi, thông báo thành công
        return redirect()->back()->with('success', 'Đơn hàng đã bị từ chối và email đã được gửi thành công.');
    } catch (\Exception $e) {
        // Nếu có lỗi khi gửi email, thông báo lỗi
        return redirect()->back()->with('error', 'Đơn hàng đã bị từ chối nhưng không thể gửi email. Lỗi: ' . $e->getMessage());
    }
}
public function approveOrder($orderId)
{
    $order = Order::find($orderId);
    if ($order) {
        // Cập nhật trạng thái đơn hàng
        $order->status = 'approved'; // Hoặc một trạng thái phù hợp
        $order->save();

        // Gửi thông báo đến khách hàng qua email
        $order->user->notify(new OrderStatusUpdated($order));
        Mail::to($order->email)->send(new OrderStatusUpdated($order));
        return redirect()->route('admin.orders.index')
            ->with('status', 'Đơn hàng đã được duyệt và thông báo đã được gửi!');
    }

    return redirect()->route('admin.orders.index')
        ->with('error', 'Không tìm thấy đơn hàng.');
}


public function sendTestEmail()
{
    $recipient = 'lienbinhlanh@gmail.com';

    try {
        Mail::raw('Đây là email thử nghiệm từ Laravel', function($message) use ($recipient) {
            $message->to($recipient)
                    ->from('phanvson05@gmail.com')
                    ->subject('Thông báo trạng thái đơn hàng');
        });

        return 'Đã gửi email đến anh ' . $recipient;
    } catch (\Exception $e) {
        return 'Lỗi gửi email: ' . $e->getMessage();
    }
}




public function sendOrderStatusEmail()
{
    Mail::to('lienbinhlanh@gmail.com')->send(new OrderStatusUpdated());
}
}
