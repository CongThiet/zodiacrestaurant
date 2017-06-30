<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\OrderDetail;
use App\User;

class Order extends Model
{
    public function customer(){
        return $this->hasOne(Customer::class);
    }
    public function order_detail(){
        return $this->hasMany(OrderDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
