<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('home.formdangki');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|regex:/^[0-9]{10}$/|unique:users,phone', // Kiểm tra định dạng số điện thoại
            'password' => 'required|string|min:6|confirmed', // Đảm bảo mật khẩu và confirm password khớp
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, // Thêm dòng này để lưu số điện thoại
            'password' => bcrypt($request->password), // Mã hóa mật khẩu bằng bcrypt
        ]);
    
        auth()->login($user);
    
        // Nếu bạn dùng Position liên quan đến user, cần xử lý mối quan hệ này
        if ($user->Position) {
            $positionName = $user->Position->name;
            session(['position' => $positionName]);
        }
    
        return redirect()->route('home')->with('success', 'Đăng ký thành công!');
    }
    
    // login
    public function showLoginForm(){
        return view('home.formdangnhap');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email',$request->email)->first();

        // Kiểm tra mật khẩu
        if ($user && (md5($request->password) === $user->password)) {
            auth()->login($user);
            $positionName = $user->Position->name;
            session(['position' => $positionName]);
            if($positionName === 'khach_hang'){
                 return redirect()->route('home');
            }
            else{
                 return redirect()->route('admin');
            }
        }

       
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }
    public function logout()
    {
        auth()->logout(); // Đăng xuất người dùng
        session()->invalidate(); // Hủy bỏ tất cả session
        session()->regenerateToken(); // Tạo lại token CSRF
        return redirect()->route('homemm'); // Chuyển hướng về trang chủ hoặc trang đăng nhập
    }
    
}
