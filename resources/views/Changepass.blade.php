@extends('inc.layout')
@section('content')

<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif
    <h3>Change password</h3>
     <a class="btn" href="{{ url()->previous() }}"><button type="button" class="btn btn-danger">Go Back</button></a>
        <form action = "{{route('Changepassword')}}" method = "post">
            {{@csrf_field()}}
            New Password  : <input type = "password" name = "pass" ><br><br>
            @error('pass')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            Retype New Password  :<input type = "password" name = "npass" ><br><br>
            @error('npass')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "submit" class = "btn btn-success" value = "Change">

            
        </form>
    <center>

    @endsection