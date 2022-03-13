@extends('inc.layout')
@section('content')
@include('inc.navadmin')
<center>@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif</center>
<br>
<h1>Manage Slide</h1><br><br>

<form action = "{{route('admin.slide')}}" method = "post" enctype = "multipart/form-data">
    {{@csrf_field()}}
        <input type = "text" name = "name"placeholder = "Cupon Name"><br><br>
        @error('name')
            <span class = "text-danger">{{$message}}</span><br>
        @enderror
        <input type = "file" name = "image"id = "image"><br>
        @error('image')
            <span class = "text-danger">{{$message}}</span><br>
        @enderror
        <br>
        <input type = "submit" class = "btn btn-primary" value = "Add Cupon">
</form>
<br><br>

@endsection