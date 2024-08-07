<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("user.doithongtin", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasFile("avatar")) {
            $file = $request->file("avatar")
                ->store("uploads/avartar", 'public');
        } else {
            $file = $user->avatar;
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'avatar' => $file
        ]);

        return back()->with('success', 'Sửa thành công');
    }


    // public function formDMK($id)
    // {
    //     $user = User::find($id);
    //     return view('user.userinfo', compact('user', 'id'));
    // }

    public function updatePas(Request $request, $id)
    {

        $user = User::find($id);

        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
            return back()->with('success', 'Mật khẩu đã được đổi');
        } else {
            return back()->withErrors('old_password', 'Mật khẩu cũ không đúng');
        }
    }
}