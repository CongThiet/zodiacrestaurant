<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\Category;


class Product extends Model
{
    // public $timestamps = false;
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function order_detail(){
        return $this->hasMany(OrderDetail::class,'product_id');
    }
}
