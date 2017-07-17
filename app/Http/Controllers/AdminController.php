<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Contact;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Charts;
use Session;

class AdminController extends Controller
{
    public function viewOrder(){
        $today = Carbon::today('Asia/Ho_Chi_Minh')->toDateString();
        $orders = Order::where('orderDate',$today)->latest()->paginate(5);
        return view('views.admin.admin-order',compact('today','orders'));
    }

    public function selectDay(Request $request){
        $day = $request->day;
        $orderDay = Order::where('orderDate',$day)->latest()->get();
        session()->flash('orderDay', $orderDay);
        session()->flash('day', $day);
        return redirect()->back();
    }

    public function viewContact(){
        $contacts = Contact::where('status','chưa xem')->latest()->paginate(5);
        $contactSeens = Contact::where('status','đã xem')->latest()->get();
        return view('views.admin.admin-contact',compact('contacts','contactSeens'));
    }

    public function contactDestroy(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn liên lạc nào'
        ]);
        $checkbox = $request->all();
        foreach($checkbox['checkbox'] as $id) {
            Contact::find($id)->delete();
        }
        return redirect()->back()->with('contact-del','Liên lạc của khách hàng đã được xóa');
    }

    public function viewContactDetail($contact){
        try{
            $contactdetail = Contact::findOrFail($contact);
        return view('views.admin.admin-contact-view',compact('contactdetail'));
        }
        catch(\Exception $e){
           return \Response::view('errors.404',array(),404);
        }
    }

    public function contactDetailSeen($contact){
        Contact::find($contact)
                ->update(['status'=> 'đã xem']);
        return redirect(route('admin-contact'));
    }


    public function ordered(Order $order){
        Order::find($order->id)
                ->update(['status'=> 'Đã nhận đơn hàng']);
        if($order->nameShip == null){
            Order::find($order->id)
                ->update(['nameShip'=>Auth::user()->name]);
        }      
        return redirect(route('admin-order'));
    }

    public function manager(){
        $data = OrderDetail::selectRaw('products.*,count(*) as total')
                ->join('products','products.id','=','order_details.product_id')
                ->groupBy('product_id')
                ->orderByDesc('total','desc')
                ->limit('5')
                ->get();
        // // dd($products);
        $chart = Charts::create('pie', 'highcharts')
                ->title('Sản phẩm được đặt hàng nhiều nhất')
                ->elementLabel('My nice label')
                ->labels($data->pluck('productName'))
                ->values($data->pluck('total'))
                // ->dimensions(700,500)
                ->responsive(false);
                //dd($chart);
        $products = Product::paginate(10);

        return view('views.admin.admin-managerment',['chart' => $chart], compact('products'));
    }
    public function managermentProduct($id){
        try{
            $products = Product::findOrFail($id);
            return view('views.admin.admin-product', compact('products'));
        }
        catch(\Exception $e){
           return \Response::view('errors.404',array(),404);
        }
    }
    public function managermentProductUpdate(Request $request, $id){
        $products = Product::find($id);
        if($request->image_menu){
            $products->image = $request->image_menu->getClientOriginalName();
            $request->image_menu->move('admin/images/images-product', $products->image);
        }
        $products->productName = $request->productName;
        $products->price = $request->price;
        $products->save();
        return redirect()->back();
    }
    public function managermentProductRemove($id){
        Product::find($id)->delete();
        return redirect(route('admin-managerment'));
    }
    public function productSearch(Request $request){
        $output = " ";
        $search =$request->search;
        $products = Product::where('productName', 'like',"%$search%")
                            ->get();
        if($request->ajax()){
            if($products){
                foreach($products as $product){
                $output .= '<tr>'.
                                '<td>'.$product->id.'</td>'.
                                '<td><a href="/admin/product/control/'.$product->id.'" title="'.$product->productName.'">'.$product->productName.'</a></td>'.
                                '<td>'.$product->price.'VNĐ</td>'.
                            '</tr>';
                }
            }
            return response()->json($output);  
        }
    }

}
