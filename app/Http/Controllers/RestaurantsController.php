<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use App\Contact;
use App\Promotion;
use App\Location;
// use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index(){
      // $product = Product::all();
      $product = Product::paginate(8);
      $category = Category::all();
      return view('views.homepage.shop',compact('product','category'));
    }
    public function show(Category $category){
        $category->products = Product::where('category_id',$category->id)->paginate(8);
        $categories = Category::all();
        return view('views.homepage.category',compact('category','categories'));
    }
    public function store(){
        $this->validate(request(),[
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required|min:8|max:16',
                'message'=>'required'
            ],
            [
                'name.required'=>'Vui lòng điền đầy đủ họ và tên.',
                'phone.required'=>'Vui lòng điền số điện thoại',
                'phone.min'=>'Số điện thoại bạn quá ngắn tối thiểu 8 số.',
                'phone.max'=>'Số điện thoại bạn quá dài.',
                'email.required'=>'Vui lòng điền địa chỉ email.',
                'email.email'=>'Địa chỉ email không đúng định dạng.',
                'message.required'=>'Vui lòng điền tin nhắn.'
            ]);
        $contact = Contact::create([
            'name'=>request('name'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'message'=>request('message')
        ]);
        return redirect()->back()->with('contact','Tin nhắn của bạn đã được gửi.');  
    }
    public function promotion(){
        $promotions = Promotion::orderByDesc('id','desc')->paginate(4);
        return view('views.homepage.promotion',compact('promotions'));
    }
    public function location(){
        $location = Location::all();
        return view('views.homepage.location',compact('location'));
    }
}