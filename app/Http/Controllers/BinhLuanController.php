<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index()
    {
        $user = BinhLuan::all();
        return view("admin.binhluan.index", compact("user"));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                "binh_luan" => "required",
                "tin_tuc_id" => "required",
            ]
        );

        $user = auth()->user()->name;

        BinhLuan::create([
            "tin_tuc_id" => $request->tin_tuc_id,
            "ten_nguoi_dung" => $user,
            "binh_luan" => $request->binh_luan,
        ]);
    }
}
