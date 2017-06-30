<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderDetail extends Model
{
    protected $table = "order_details";
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}