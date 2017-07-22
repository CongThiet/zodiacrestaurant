<?php 
namespace App\Repository;
use Log;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class OrderRepository
{
    public static function GetToday(){
        Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
            //get orders by date
        return Carbon::today('Asia/Ho_Chi_Minh')->toDateString();
    }
	public static function GetOrdersByDate(){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
            //get orders by date
        $today = OrderRepository::GetToday();
        
		return Order::where('orderDate',$today)->latest()->paginate(5);
	}
}