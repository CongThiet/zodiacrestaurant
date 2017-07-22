<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\User;
use DB;
use Carbon\Carbon;

class CartController extends Controller
{   
    public function  __construct()
    {
        $this->middleware('CheckOrderLevel')->except('index','viewOrderDetail');
    }
    public function index(){
        return view('views.cart.cart');
    }

    public function viewOrder(User $user){
        $orders = Order::where('user_id',$user->id)->latest()->paginate(4);
        return view('views.order.view-order',compact('orders'));
    }
    public function viewOrderDetail(Order $order){
        $order_details = OrderDetail::where('order_id','=' ,$order->id)
                        ->join('products','products.id','=','order_details.product_id')
                        ->get();
        $customers = Customer::where('id',$order->customer_id)->get();
        return view('views.order.view-order-detail',compact('order','order_details','customers'));
        
    }
    // add cart -> redirect go home
    public function addCartGoMenu(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $id);
        $request->session()->put('cart',$cart);
        return redirect('../../#menu');
        
    }
     // add cart -> redirect go cart
    public function addCartGoCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $id);
        $request->session()->put('cart',$cart);
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


    public function store(){
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
        Customer::create([
            'user_id'=>Auth::user()->id,
            'name'=>request('name'),
            'gender'=>request('gender'),
            'address'=>request('address'),
            'phone'=>request('phone'),
            'note'=>request('note')
        ]);

        $customers = Customer::latest()->limit('1')->get();   //lastst() xếp theo created_at; orderByDesc('id','desc') xếp theo id
        $cart = Session::get('cart');
        foreach($customers as $customer){
            Order::create([
                'user_id'=>Auth::user()->id,
                'customer_id'=>$customer->id,
                'orderDate'=>Carbon::today('Asia/Ho_Chi_Minh')->toDateString(),
                'totalPrice'=>$cart->totalPrice,
                'payment'=>request('payment_method'),
                'note'=>request('note')
            ]);
        }
        
        foreach ($cart->items as $key => $value) {
            $orders = Order::latest()->limit('1')->get(); 
            foreach($orders as $order){
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$value['item']['id'],
                    'quantity'=>$value['quantity'],
                    'price'=>($value['price']/$value['quantity'])
                ]);
            }
        }
        Session::forget('cart');
        return redirect()->back()->with('notification','Bạn đặt hàng thành công!!!');
        // use Request $request
        // $customer = new Customer;
        // $customer->user_id = Auth::user()->id;
        // $customer->name = $request->name;
        // $customer->gender = $request->gender;
        // $customer->address = $request->address;
        // $customer->phone = $request->phone;
        // $customer->note = $request->note;
        // $customer->save();

        // $cart = Session::get('cart');
        // $order = new Order;
        // $order->user_id = Auth::user()->id;
        // $order->customer_id = $customer->id;
        // $order->orderDate = date('Y-m-d');
        // $order->totalPrice = $cart->totalPrice;
        // $order->payment = $request->payment_method;
        // $order->note = $request->note;
        // $order->save();
        // foreach ($cart->items as $key => $value) {
            // $order_detail = new OrderDetail;
            // $order_detail->order_id = $order->id;
            // $order_detail->product_id = $value['item']['id'];
            // $order_detail->quantity = $value['quantity'];
            // $order_detail->price = ($value['price']/$value['quantity']);
            // $order_detail->save();
        // }
        // Session::forget('cart');
        // return redirect()->back()->with('notification','Đặt hàng thành công - Chúc bạn có một bữa ăn vui vẻ!!!');
    
    }
    
}