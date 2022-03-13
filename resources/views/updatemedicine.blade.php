@extends('inc.layout')

@section('content')

<center>
@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif
<h3>
<a class="btn" href="{{ url()->previous() }}"><button type="button" class="btn btn-danger">Go Back</button></a>  <br>
            Update Medicine
        </h3>

        <form action = "{{route('medicine.edit',['id'=>$m->id])}}" method = "post">
            {{csrf_field()}}
    <input type = "text" name = "name" value = "{{$m->name}}" placeholder = "Medicine Name"><br>
            @error('name')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <input type = "text" name = "unit_price" value = "{{$m->unit_price}}" placeholder = "Unit Price"><br>
            @error('unit_price')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <textarea name = "description" value = "{{$m->description}}" placeholder = "Description"></textarea><br>
            @error('description')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror

            <input type = "text" name = "stock" value = "{{$m->stock}}" placeholder = "Stock"><br>
            @error('stock')
                <span class = "text-danger">{{$message}}</span> <br>
            @enderror

            <input type = "submit" class = "btn btn-outline-success" value = "Update">
        </form>
</center>

@endsection