@extends('inc.layout')
@section('content')
@include('inc.navadmin')
<center>@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif</center>
<br>
<a class="btn" href="{{route('admin.slide')}}"><button type="button" class="btn btn-success">ADD SLIDE</button></a>
<table class="table table-bordered">
<tr>
    <th>
        Name
    </th>
    <th>
        slide
    </th>
</tr>
<tr>
    @foreach($slides as $o)
         <tr align = "center">
        <td>{{$o->Name}}</td>
        <td><img src = "{{asset($o->image)}}" height = "150px" width = "200px"></td>
        <td> <a href = "{{route('slide.delete',['id'=>$o->ID])}}" >
            <input type = "button" class = "btn btn-danger" value = "Delete">
        </td>
        </tr>
    @endforeach
</tr>

</table>

@endsection