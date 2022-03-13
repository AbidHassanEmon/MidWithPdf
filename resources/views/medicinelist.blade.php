@extends('inc.layout')

@section('content')
@include('inc.navadmin')
<br>
<a class="btn btn-success" href="addmedicine">Add Medicine</a>
<center>
@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif
<br>
<h4>
<br><br>
            Medicine List
        </h4>

        <table>
            <tr align = "center">
                <th>
                    Sample
                </th>

                <th>
                    Name
                </th>

                <th>
                    Unit Price
                </th>

                <th>
                    Description
                </th>

                <th>
                    Stock
                </th>

                
            </tr>


            <tr>
                @foreach($medicines as $m)
                    <tr align = "center">
                        <td><img src = "{{asset($m->image)}}" height = "100px" width = "100px"></td>
                        <td>{{$m->name}}</td>
                        <td class = "text-success">{{$m->unit_price}} Taka</td>
                        <td>{{$m->description}}</td>
                        <td class = "text-danger">{{$m->stock}} Units</td>
                        <td> <a href = "{{route('medicine.edit',['id'=>$m->id])}}" ><input type = "button" class = "btn btn-secondary" value = "Update"></a></td>
                        <td> <a href = "{{route('medicinedelete',['id'=>$m->id])}}" ><input type = "button" class = "btn btn-danger" value = "Delete"></a></td>
                    </tr>
                @endforeach
            </tr>
        </table>
</center>
@endsection