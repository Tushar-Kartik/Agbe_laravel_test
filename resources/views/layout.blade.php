<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    @stack('styles')
</head>
<body>
   
       <nav class="navbar">
            <ul>
                <li><a href="/login">Log in</a></li>
                <li><a href="/register">Register</a></li>
            </ul>
       </nav>
       
        <div class="register_cont">
             @yield('content')
        </div>
        


    
</body>
</html>