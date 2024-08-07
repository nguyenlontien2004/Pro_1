<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function user()
    {

        $user = Auth::user();

        return view("user.userinfo", compact("user"));
    }

    public function formDangKy()
    {
        return view("user.dangky");
    }
    
    public function formDangNhap()
    {
        return view("user.dangnhap");
    }

    public function dangKy(Request $request)
    {
        User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => bcrypt($request->input("password")),
        ]);

        return redirect()->route('login')->with('success', 'Bạn đã đăng ký thành công mời đăng nhập');
    }

    public function dangNhap(Request $request)
    {
        $check = $request->only('email', 'password');

        if (Auth::attempt($check)) {
            request()->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('danhmuc.trangchu');
            }

            if ($user->role == 'user') {
                return redirect()->route('user.trangchu');
            }
        }
        return back()->with('error', 'Thông tin đăng nhập không chính xác');
    }


    public function dangXuat()
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/trang-chu');
    }
}