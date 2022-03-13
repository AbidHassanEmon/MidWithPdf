
@extends('inc.layout')
@section('content')
@include('inc.navadmin')
<center>@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif</center>
<br>
<h1>Admin Dash</h1><br><br>

@endsection

