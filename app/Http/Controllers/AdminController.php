<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\Storage;

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
    public function add_product()
    {
        $hotProducts = Product::productWithTag('Hot')->get()->take(4);
        $cheapProducts = Product::productWithTag('Giá rẻ')->get()->take(4);
        $brands = Brand::all();
        $categories = Category::all();
        return view('home.add_product', compact('hotProducts', 'cheapProducts', 'brands','categories'));
    }
    public function adminthongtin()
    {
        // Lấy danh sách người dùng cùng quyền hạn (position)
        $users = User2::with('position')->get();  // Lấy dữ liệu từ bảng 'users' cùng với dữ liệu quyền hạn từ bảng 'positions'

        // Truyền dữ liệu qua view 'home.admin_manage_user'
        return view('home.admin_manage_user', compact('users'));
    }
    public function edit_user($id)
    {
        // Tìm người dùng theo ID
        $user = User2::findOrFail($id);
    
        // Truyền dữ liệu qua view (ví dụ, tạo form để sửa thông tin)
        return view('home.edit_user', compact('user'));
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
    return redirect()->route('adminthongtin')->with('success', 'Cập nhật thông tin người dùng thành công!');
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









    
}
