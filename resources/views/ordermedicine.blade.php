@extends('inc.layout')
@section('content')
@include('inc.navbarcus')

<center>@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif</center>
<h1>Order Placed</h1>
        <h4 class = "text-danger">Total: {{$order->total_price+$discount}} taka</h4>

        <h4 class = "text-danger">You Have To Pay : {{$order->total_price}} taka</h4>

        <h4 class = "text-danger">YOU GOT A Discount OF : {{$discount}} taka

        <h5>Our employee will deliver your Product soon</h5>

@endsection