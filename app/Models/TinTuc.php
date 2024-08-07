<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'tom_tat',
        'hinh_anh',
        'ngay_dang',
        'danh_muc_id'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMucTinTuc::class, 'danh_muc_id');
    }

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'tin_tuc_id');
    }
}
