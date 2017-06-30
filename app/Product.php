<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;
use App\Category;


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
