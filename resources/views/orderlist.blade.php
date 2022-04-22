@extends('inc.layout')

@section('content')
@include('inc.navadmin')<br>
<div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
</div>
<br>
<table class="table table-bordered">
            <tr>
                <th>
                    NO
                </th>
                
                <th>
                    Medicine ID
                </th>
                <th>
                    Order Quantity
                </th>
                <th>
                    Ordered Medicine
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Total Price
                </th>
                <th>
                    Updated At
                </th>
                <th>
                    Created At
                </th>
            </tr>
            
            <tr>
                @foreach($order as $o)
                    <tr align = "center">
                        <td>{{$o->id}}</td>
                
                        <td>{{$o->medicine_id}}</td>
                        <td>{{$o->order_quantity}}</td>
                        <td>{{$o->medicine->name}}</td>
                        <td>{{$o->medicine->unit_price}}</td>
                        <td>{{$o->total_price}}</td>
                        <td>{{$o->updated_at}}</td>
                        <td>{{$o->created_at}}</td>
                    </tr>
                @endforeach
            </tr>

        </table>
@endsection