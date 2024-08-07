<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\DanhMucTinTuc;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index()
    {
        $tintucs = TinTuc::with("danhMuc")
            ->latest('id')
            ->paginate(5);
        return view('admin.tintuc.index', compact('tintucs'));
    }

    public function create()
    {

        $danhmuc = DanhMucTinTuc::all();

        return view('admin.tintuc.create', compact('danhmuc'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh')
                ->store('uploads/tintuc', 'public');
        } else {
            $file = 'null';
        }

        TinTuc::create([
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'tom_tat' => $request->input('tom_tat'),
            'hinh_anh' => $file,
            'ngay_dang' => $request->input('ngay_dang'),
            'danh_muc_id' => $request->input('danh_muc_id'),
        ]);

        return redirect()->route('tintuc.trangchu')->with('success', 'Thêm tin tức thành công');
    }

    public function show($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $danhmuc = DanhMucTinTuc::all();
        return view('admin.tintuc.show', compact('danhmuc', 'tintuc'));
    }

    public function edit($id)
    {
        $danhmuc = DanhMucTinTuc::all();
        $tintuc = TinTuc::find($id);

        return view('admin.tintuc.edit', compact('danhmuc', 'tintuc'));
    }

    public function update(Request $request, $id)
    {
        $tintuc = TinTuc::findOrFail($id);

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh')
                ->store('uploads/tintuc', 'public');
        } else {
            $file = 'null';
        }


        $tintuc->update([
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'tom_tat' => $request->input('tom_tat'),
            'hinh_anh' => $file,
            'ngay_dang' => $request->input('ngay_dang'),
            'danh_muc_id' => $request->input('danh_muc_id'),
        ]);

        return redirect()->route('tintuc.trangchu')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        TinTuc::findOrFail($id)->delete();

        return redirect()->route('tintuc.trangchu')->with('success', 'Xóa thành công');
    }

    public function indexUser()
    {

        $tintop10 = TinTuc::select('id', 'tieu_de', 'hinh_anh', 'luot_xem')
            ->orderBy('luot_xem', 'desc')
            ->limit(6)
            ->get();

        $lq1 = TinTuc::select('id', 'tom_tat', 'hinh_anh', 'ngay_dang', 'tieu_de')
            ->orderBy('ngay_dang', 'desc')
            ->limit(6)
            ->get();

        $tinmoi = TinTuc::select('id', 'tom_tat', 'hinh_anh', 'ngay_dang', 'tieu_de')
            ->orderBy('ngay_dang', 'desc')
            ->limit(2)
            ->get();

        $tintucs = TinTuc::all();

        return view('user.index', compact('tintucs', 'tinmoi', 'lq1', 'tintop10'));
    }

    public function tinLoai($id)
    {
        $kq = DanhMucTinTuc::findOrFail($id);

        $data = TinTuc::where('danh_muc_id', $id)
            ->get();

        return view('user.danhmuctin', compact('data', 'id', 'kq'));
    }

    public function chiTietTin($id)
    {

        $binhluan = BinhLuan::where('tin_tuc_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        TinTuc::where('id', $id)->increment('luot_xem');

        $tintuc = TinTuc::findOrFail($id);

        $lq1 = TinTuc::select('id', 'tom_tat', 'hinh_anh', 'ngay_dang', 'tieu_de')
            ->orderBy('ngay_dang', 'desc')
            ->limit(6)
            ->get();

        return view('user.chitiet', compact('tintuc', 'id', 'lq1', 'binhluan'));
    }

    public function tinMoi()
    {
        $news = TinTuc::all();
        return view('user.tinmoi', compact('news'));
    }

    public function timKiem(Request $request)
    {
        $timkiem = $request->input('timkiem');

        $tintucs = TinTuc::where('tieu_de', 'like', '%' . $timkiem . '%')
            ->orWhere('tom_tat', 'like', '%' . $timkiem . '%')
            ->get();

        return view('user.timkiem', compact('timkiem', 'tintucs'));
    }
}