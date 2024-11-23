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
            'password' => 'required|string',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);
        $user->refresh();
        auth()->login($user);
        $positionName = $user->Position->name;
        session(['position' => $positionName]);
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
        auth()->logout(); 
        session()->put('position', null);
        return redirect()->route('home'); 
    }
}
