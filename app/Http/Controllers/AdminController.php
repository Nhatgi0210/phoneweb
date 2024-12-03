<?php

namespace App\Http\Controllers;
use App\Models\Position;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Province;
use App\Models\District;
class AdminController extends Controller
{
    //
    public function appadmin()
    {
        $hotProducts = Product ::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand ::all();
        $categories = Category::all();
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập

        return view('home.appadmin', compact('hotProducts', 'cheapProducts', 'brands','categories','user'));
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
        $users = User2::where('position_id', 1)->get();

        return view('home.admin', compact('hotProducts', 'cheapProducts', 'brands','categories','users'));
    }
    public function admin_manage_product()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::all();
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
        $tags = Tag::all();
        return view('home.admin_manage_product', compact('hotProducts', 'cheapProducts', 'brands','categories','products','user','tags'));
    }
    public function admin_duyet()
{
    $hotProducts = Product::productWithTag('Hot')->get()->take(4);
    $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
    $brands = Brand::all();
    $categories = Category::all();
    $products = Product::all();
    $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
    $tags = Tag::all();
    $orders = Order::all();  // Lấy tất cả đơn hàng từ cơ sở dữ liệu
    
    // Truyền biến vào view bằng phương thức `with()`
    return view('home.admin_duyet')
        ->with('orders', $orders)
        ->with('hotProducts', $hotProducts)
        ->with('cheapProducts', $cheapProducts)
        ->with('brands', $brands)
        ->with('categories', $categories)
        ->with('products', $products)
        ->with('user', $user)
        ->with('tags', $tags);
}

    public function admin_manage_user()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.admin_manage_user', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function edit_product()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.edit_product', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function add_product()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập

        return view('home.add_product', compact('hotProducts', 'cheapProducts', 'brands','categories','user'));
    }
    public function adminthongtin()
{
    // Lấy danh sách người dùng cùng quyền hạn (position)
    $users = User2::with('position')->get();  // Lấy dữ liệu từ bảng 'users' cùng với dữ liệu quyền hạn từ bảng 'positions'

    // Lấy danh sách quyền từ bảng 'positions'
    $positions = Position::all();  // Giả sử bạn có model Position, nếu không thì thay thế bằng model tương ứng

    // Truyền dữ liệu qua view 'home.admin_manage_user'
    return view('home.admin_manage_user', compact('users', 'positions'));
}

    public function edit_user($id)
    {
        // Tìm người dùng theo ID
        $user = User2::findOrFail($id);
    
        // Truyền dữ liệu qua view (ví dụ, tạo form để sửa thông tin)
        return view('home.profile', compact('user'));
    }
    public function update_user(Request $request, $id)
{
    // Xác định người dùng cần cập nhật
    $user = User2::findOrFail($id);

    // Cập nhật thông tin người dùng
    $user->name = $request->input('name');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->adress = $request->input('adress');
    $user->save();

    // Chuyển hướng về trang thông tin người dùng với thông báo thành công
    return redirect()->route('profile')->with('success', 'Cập nhật thông tin người dùng thành công!');
}
public function admin_thongtin2($id)
{
    // Lấy thông tin người dùng theo ID
    $user = User2::find($id); 

    // Trả về view với thông tin người dùng
    return view('home.admin_thongtin', compact('user'));
}





public function update(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
        'adress' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Kiểm tra ảnh
    ]);

    // Tìm người dùng cần cập nhật
    $user = User2::findOrFail($id);
    
    // Cập nhật thông tin người dùng
    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->email = $request->email;
    $user->adress = $request->adress;

    // Kiểm tra xem có ảnh đại diện mới không
    if ($request->hasFile('avatar')) {
        // Xóa ảnh cũ nếu có
        if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
            Storage::delete('public/' . $user->avatar);
        }

        // Lưu ảnh mới vào thư mục public/storage
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        
        // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
        $user->avatar = $avatarPath;
    }

    // Lưu thông tin vào cơ sở dữ liệu
    $user->save();

    // Trả về trang chi tiết người dùng với thông báo thành công
    return redirect()->route('admin_thongtin')->with('success', 'Cập nhật thông tin thành công');
}

public function profile()
{
    $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
    return view('home.admin_thongtin', compact('user'));
}



public function destroy($id)
{
    $user = User2::find($id);  // Tìm người dùng với ID
    if ($user) {
        $user->delete();  // Xóa người dùng
        return redirect()->route('adminthongtin')->with('success', 'User deleted successfully!');
    } else {
        return redirect()->route('adminthongtin')->with('error', 'User not found');
    }
}


public function updatePosition(Request $request, $id)
{
    // Validate dữ liệu đầu vào
    $request->validate([
        'position_id' => 'required|exists:positions,id',  // Kiểm tra position_id có tồn tại trong bảng positions
    ]);

    // Lấy người dùng theo ID
    $user = User2::findOrFail($id);

    // Cập nhật quyền của người dùng
    $user->position_id = $request->input('position_id');
    $user->save();

    // Quay lại trang danh sách người dùng với thông báo thành công
    return redirect()->route('adminthongtin')->with('success', 'Quyền hạn người dùng đã được cập nhật!');
}



public function edit_product2($id)
{
    $product = Product::with('brand', 'category', 'phoneConfig')->findOrFail($id);
    $brands = Brand::all();
    $categories = Category::all();
    $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
    // \Log::info('Product Details:', $product->toArray()); // Debug dữ liệu sản phẩm

    return view('home.edit_product', compact('product', 'brands', 'categories','user'));
}




public function update_product(Request $request, $id)
{
    // Lấy sản phẩm từ database
    $product = Product::find($id);

    // Cập nhật thông tin của sản phẩm
    $product->update([
        'name' => $request->TenSP,
        'original_price' => $request->DonGia,
        'category_id' => $request->MaDM,
        'brand_id' => $request->MaLSP,
    ]);

    // Cập nhật thông tin cấu hình điện thoại (screen, chip, RAM, ROM, Pin)
    $product->phoneConfig()->updateOrCreate(
        ['product_id' => $product->id],
        [
            // 'ManHinh' => $request->ManHinh,
            'man_hinh' => $request->man_hinh, // Đổi ManHinh thành man_hinh
            'camera_truoc' => $request->camera_truoc,

            'camera_sau' => $request->camera_sau,

            'Chip' => $request->Chip,
            'ROM' => $request->ROM,
            'RAM' => $request->RAM,
            'Pin' => $request->Pin,
        ]
    );

    // Redirect lại trang quản lý sản phẩm với thông báo thành công
    return redirect()->route('admin_manage_product')->with('success', 'Sản phẩm đã được cập nhật!');
}


public function listCustomers()
{
    // Lấy danh sách khách hàng (position_id = 1)
    $users = User2::where('position_id', 1)->get();

    // Truyền dữ liệu sang view
    return view('home.customer_list', compact('users'));
}


public function listUsers(Request $request)
{
    $query = User2::query(); // Lấy tất cả người dùng

    // Xử lý tìm kiếm
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('phone', 'LIKE', "%{$search}%");
        });
    }

    $users = $query->get();

    return view('admin.customer_list', compact('users'));
}


public function orders()
{
    $orders = Order::where('status', 'pending')->with('items.product')->get();

    return view('home.admin_duyet', compact('orders'));
}


public function updateOrderStatus(Request $request, $orderId)
{
    $order = Order::findOrFail($orderId);
    $order->status = $request->status; // Chọn trạng thái: 'approved', 'rejected', v.v.
    $order->save();

    return redirect()->route('home.admin_duyet')->with('status', 'Đơn hàng đã được cập nhật!');
}



public function rejectOrder($orderId)
{
    $order = Order::findOrFail($orderId);
    $order->status = 'rejected';
    $order->save();

    return redirect()->route('admin.orders');
}
public function showOrders()
{
    // Lấy tất cả các đơn hàng đang ở trạng thái "pending"
    $orders = Order::where('status', 'pending')->get();
    
    return view('home.admin_duyet', compact('orders'));
}


  
}
