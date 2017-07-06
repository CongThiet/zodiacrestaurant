<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Contact;
use App\OrderDetail;
use DB;
use Charts;

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
        $contactSeens = Contact::where('status','đã xem')->latest()->paginate(5);
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
            Contact::where('id', $id)->delete();
        }
        return redirect()->back()->with('contact-del','Liên lạc của khách hàng đã được xóa');
    }

    public function viewContactDetail(Contact $contact){
        $contacts = Contact::find($contact);
        return view('views.admin.admin-contact-view',compact('contact','contacts'));
    }

    public function contactDetailSeen(Contact $contact){
        // $contacts = Contact::find($contact);
        Contact::where('id',$contact->id)
                ->update(['status'=> 'đã xem']);
        return redirect(route('admin-contact'));
    }


    public function ordered(Order $order){
        Order::where('id',$order->id)
                ->update(['status'=> 'Đã nhận đơn hàng']);
        if($order->nameShip == null){
            Order::where('id',$order->id)
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
            //  ->dimensions(700,500)
             ->responsive(false);
            // dd($chart);
        // return view('test', ['chart' => $chart]);
        return view('views.admin.admin-managerment',['chart' => $chart]);
    }
  
}
