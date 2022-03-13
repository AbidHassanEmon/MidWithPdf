<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\cupon;

class OrderController extends Controller
{
    //

    public function ordermedicine(Request $req){
        $req->validate([
            'unit'=>'required|numeric'
        ]);

        $customer_id = Session::get('loged')['id'];
        $discount=0;
        if($req->cupon)
        {
            $cup = cupon::all();
            foreach ($cup as $it) {
                
                if(strtoupper($req->cupon)==strtoupper($it->code))
                {
                    $discount=$it->Discount;
                     
                }
            }
        }
        
        
        
        $medicine = Medicine::where('id',$req->id)->first();
        $medicine->stock = $medicine->stock-$req->unit;
        $medicine->save();

        $order = new Order();
        $order->medicine_id = $medicine->id;
        $order->patient_id = $customer_id;
        $order->deliveryman_id = 1;
        $order->order_quantity = $req->unit;
        $order->total_price = ($medicine->unit_price*$req->unit)-$discount;

        $order->save();

        return view('ordermedicine')->with('medicine',$medicine)->with('order',$order)->with('discount',$discount);
    }

    public function orderlist(){

        $order = Order::all();
        return view ('orderlist')->with('order',$order);
    }



}
