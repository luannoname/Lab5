<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // điều chỉnh kết nối đến bảng
    // protected $table = "post";

    // khai báo tên khóa chính
    // protected $primaryKey = "Ten khoa chinh khac";

    // khai báo kiểu dữ liệu cho khóa chính mới 
    // protected $keyType = "string";
    
    // tắt tự động tăng khóa chính
    // protected $incrementing = false;

    // điều chỉnh kết nối db
    // protected $connection = "tên kết nối";

    protected $fillable = [
        'title',
        'content',
    ];
    
}
