<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\DanhMucTinTucController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/danh-muc', [DanhMucTinTucController::class, 'index'])
    ->name('danhmuc.trangchu');
Route::get('/them-danh-muc', [DanhMucTinTucController::class, 'create'])->name('danhmuc.create');
Route::post('/them-danh-muc', [DanhMucTinTucController::class, 'store'])->name('danhmuc.store');
Route::get('/sua-danh-muc/{id}', [DanhMucTinTucController::class, 'edit'])->name('danhmuc.edit');
Route::put('/sua-danh-muc/{id}', [DanhMucTinTucController::class, 'update'])->name('danhmuc.update');
Route::delete('/xoa-danh-muc/{id}', [DanhMucTinTucController::class, 'destroy'])->name('danhmuc.destroy');

Route::get('/tin-tuc', [TinTucController::class, 'index'])->name('tintuc.trangchu');
Route::get('/them-tin-tuc', [TinTucController::class, 'create'])->name('tintuc.create');
Route::post('/them-tin-tuc', [TinTucController::class, 'store'])->name('tintuc.store');
Route::get('/xem-tin-tuc/{id}', [TinTucController::class, 'show'])->name('tintuc.show');
Route::get('/tin-tuc/{id}/edit', [TinTucController::class, 'edit'])->name('tintuc.edit');
Route::put('/tin-tuc/{id}/edit', [TinTucController::class, 'update'])->name('tintuc.update');
Route::delete('/xoa-tin-tuc/{id}', [TinTucController::class, 'destroy'])->name('tintuc.destroy');
Route::get('/binh-luan', [BinhLuanController::class, 'index'])->name('binhluan.trangchu');

Route::get('/trang-chu', [TinTucController::class, 'indexUser'])->name('user.trangchu');
Route::get('/tin-loai/{id}', [TinTucController::class, 'tinLoai']);
Route::get('/tin/{id}', [TinTucController::class, 'chiTietTin'])->name('tin.chitiet');
Route::get('/tin-moi', [TinTucController::class, 'tinMoi'])->name('tin.tinmoi');
Route::get('/timkiem', [TinTucController::class, 'timkiem'])->name('timkiem');
Route::post('/binhluan', [BinhLuanController::class, 'store'])->name('binhluan.store');

Route::get('/dang-ky', [AuthController::class, 'formDangKy'])->name('dangky');
Route::post('/dang-ky', [AuthController::class, 'dangKy']);
Route::get('/login', [AuthController::class, 'formDangNhap'])->name('login');
Route::post('/login', [AuthController::class, 'dangNhap']);
Route::post('/dang-xuat', [AuthController::class, 'dangXuat'])->name('dangxuat');
Route::get('/nguoidung', [AuthController::class, 'user'])->name('user.nguoidung');

Route::get('nguoi-dung{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('nguoi-dung{id}', [UserController::class, 'edit'])->name('user.update');
Route::post('/doimk/{id}', [UserController::class, 'formDMK'])->name('form.doimk');
Route::put('/doi-mk-nguoi-dung/{id}', [UserController::class, 'updatePas'])->name('user.doim3k')->middleware('auth');
