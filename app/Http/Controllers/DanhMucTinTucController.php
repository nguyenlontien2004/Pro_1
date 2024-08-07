<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTinTuc;
use Illuminate\Http\Request;

class DanhMucTinTucController extends Controller
{
    public function index()
    {
        $data = DanhMucTinTuc::all();
        return view("admin.danhmuc.index", compact("data"));
    }

    public function getDanhMuc()
    {
        return DanhMucTinTuc::all();
    }

    public function create()
    {
        return view("admin.danhmuc.create");
    }

    public function store(Request $request)
    {
        DanhMucTinTuc::create([
            "ten_danh_muc" => $request->input("tendanhmuc"),
        ]);

        return redirect()->route("danhmuc.trangchu")->with("success", "Thêm danh mục thành công");
    }

    public function edit($id)
    {
        $danhmuc = DanhMucTinTuc::findOrFail($id);

        return view("admin.danhmuc.edit", compact("danhmuc"));
    }

    public function update(Request $request, $id)
    {
        $danhmuc = DanhMucTinTuc::findOrFail($id);

        $danhmuc->update([
            "ten_danh_muc" => $request->input("tendanhmuc"),
        ]);

        return redirect()->route("danhmuc.trangchu")->with("success", "Sửa danh mục thành công");
    }

    public function destroy($id)
    {

        DanhMucTinTuc::findOrFail($id)
            ->delete();

        return redirect()->route("danhmuc.trangchu")->with("success", "Xóa thành công");
    }
}