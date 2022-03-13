
    <html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
    <div class="p-1 bg-secondary text-white text-center">
        <h1>AEFM Pharmacy</h1>
        <p>Get your medicine at home</p> 
    </div>
    
    <center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif
    <h3>Login</h3>
        <form action = "{{route('login')}}" method = "post">
            {{@csrf_field()}}
            <input type = "text" name = "username" value = "{{old('username')}}"placeholder = "Username"><br>
            @error('username')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "password" name = "password" placeholder = "Passwords"><br>
            @error('password')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "submit" class = "btn btn-primary" value = "Log in">
        </form>

        Not yet Registered!<a href="" >Click Here</a>
    <center>
        

        <div class="mt-3 p-3 bg-secondary text-white text-center">
            <p>&copy; Med.Life LTD. 1780</p>
        </div>
    </body>
</html>