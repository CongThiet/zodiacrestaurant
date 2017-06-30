<?php

namespace App;

use App\Order;
use App\User;
// use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function order(){
        return $this->belongsto(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
