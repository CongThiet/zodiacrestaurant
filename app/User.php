<?php

namespace App;
use App\Models\Customer;
use App\Models\Order;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'level','name', 'email', 'password','address','phone','lastName','birthday','gender','other_email','facebook','image_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    //  public function comments()
    // {
    //     # code...
    //    return $this -> hasMany( Comment::class);
    // }
    // public function publish(Post $post)
    // {

    //     // Post::create([
    //     //             'title' => request('title'),
    //     //             'body' => request('body'),                    
    //     //             // 'user_id' => auth() -> user() -> id
    //     //             //or
    //     //             'user_id' => auth()->id()
    //     //     ]);  
    //     // có thể viết như trên nhưng cũng có thể viết ngắn lại
    //     $this->post()->save($post);
    // }
}
// 1 user có nhiều post, ở post controller >> gọi đến phương thức user() rồi lấy request title, body. rồi chạy phương thức publish. sau khi đã lấy đc post thì lưu vào dưới 1 user.
