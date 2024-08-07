<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = [
        "ten_nguoi_dung",
        "binh_luan",
        "tin_tuc_id",
    ];
}
