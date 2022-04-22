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

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
        $order = Order::all();
     $output = '
     <h3 align="center">Order History</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%"> NO</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Ordered Medicine</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Order Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Unit Price</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Total Price</th>
   </tr>
     ';  
     foreach($order as $o)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$o->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$o->medicine->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$o->order_quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$o->medicine->unit_price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$o->total_price.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
