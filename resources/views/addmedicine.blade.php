@extends('inc.layout')

@section('content')
@include('inc.navadmin')
<center>
<br><br>
<h4>
            Add Medicine
        </h4>

        <form action = "{{route('addmedicine')}}" method = "post" enctype = "multipart/form-data">
            {{csrf_field()}}
            <input type = "text" name = "name" value = "{{old('name')}}" placeholder = "Medicine Name"><br><br>
            @error('name')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <input type = "text" name = "unit_price" value = "{{old('unit_price')}}" placeholder = "Price"><br><br>
            @error('unit_price')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <input type = "text" name = "stock" value = "{{old('stock')}}" placeholder = "Stock"><br><br>
            @error('stock')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <textarea name = "description" placeholder = "Description"></textarea><br><br>
            @error('description')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror

            <input type = "file" name = "image"><br><br>
            @error('image')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror

            <input type = "submit" class = "btn btn-primary" value = "Add Medicine">
        </form>
</center>
@endsection