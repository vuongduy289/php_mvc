<?php
// Định nghĩa namespace theo tên thư mục từ ngoài vào trong;
namespace App\Models;
// khi sử dụng Product ở chỗ khác -> use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = 'orders';
    public $timestamps = false;
}