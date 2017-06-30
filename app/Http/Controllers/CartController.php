<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\User;
use DB;

class CartController extends Controller
{   
    public function  __construct()
    {
        $this->middleware('auth')->except ('getToCartGoMenu','getToCartGoCart','removeOneCart','removeAllGoCart','removeAllGoMenu','index');
    
    }


    public function index(){
        return view('views.cart.cart');
    }

    public function viewOrder(User $user){
        $orders = Order::where('user_id',$user->id)->latest()->paginate(5);
        return view('views.profile.viewOrder',compact('orders'));
        
    }
    public function viewOrderId(User $user, Order $order){
        $order_details = DB::table('order_details')->join('products','products.id','=','order_details.product_id')
                        ->where('order_id','=' ,$order->id)
                        ->get();
        $customers = Customer::where('id',$order->customer_id)->get();
        return view('views.profile.viewOrderId',compact('order','order_details','customers'));
        
    }
    // add cart -> redirect go home
    public function getToCartGoMenu(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $id);
        $request->session()->put('cart',$cart);
        return redirect('../../#menu');
        // return redirect()->back();
        
    }
     // add cart -> redirect go cart
    public function getToCartGoCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $id);
        $request->session()->put('cart',$cart);
        // return redirect('../../#menu');
        return redirect()->back();
        
    }
    public function removeOneCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;        
        $cart = new Cart($oldCart);
        $cart->removeOneCart($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }


    public function removeAllGoMenu($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;        
        $cart = new Cart($oldCart);
        $cart->removeAll($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect('../../#menu');
    }
    public function removeAllGoCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;        
        $cart = new Cart($oldCart);
        $cart->removeAll($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }


    public function store(Request $request){
        $this->validate(request(),[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|min:8|max:16',
            ],
            [
            'name.required'=>'Vui lòng điền tên.',
            'address.required'=>'Vui lòng điền địa chỉ.',
            'phone.required'=>'Vui lòng điền số điện thoại.',
            'phone.min'=>'Số điện thoại bạn quá ngắn tối thiểu 8 số.',
            'phone.max'=>'Số điện thoại bạn quá dài.'
            ]);
        $customer = new Customer;
        $customer->user_id = $request->user_id;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->note = $request->note;
        $customer->save();
        // Customer::create(request([
        //     'name',
        //     'gender',
        //     'email',
        //     'address',
        //     'phone_number',
        //     'note'
        // ]));
        // Order::create([
        //     'customer_id' => $customer->id,
        //     'orderDate' => date('Y-m-d'),
        //     'total' => $cart->totalPrice,
        //     'payment' => request('payment_method'),
        //     'note' => request('note')
        // ]);
        $cart = Session::get('cart');
        $order = new Order;
        $order->user_id = $customer->user_id;
        $order->customer_id = $customer->id;
        $order->orderDate = date('Y-m-d');
        $order->totalPrice = $cart->totalPrice;
        $order->payment = $request->payment_method;
        $order->note = $request->note;
        $order->save();
        // dd($cart);
        foreach ($cart->items as $key => $value) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $value['item']['id'];
            $order_detail->quantity = $value['quantity'];
            $order_detail->price = ($value['price']/$value['quantity']);
            $order_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('notification','Đặt hàng thành công - Chúc bạn có một bữa ăn vui vẻ!!!');

    }

}
