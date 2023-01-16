<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    <p>
        <h1>Nav Bar del blog</h1>
        <a href=" {{ route('blog') }} ">home</a>
        <a href=" {{ route('posts/nuevo') }} ">Nuevo post</a>
        @auth
        <a href=" {{ route('dashboard') }} "> dahboard </a>    
        @else
        <a href=" {{ route('login') }} ">Login</a>
        @endauth
    </p>
     @yield('content')
     <footer> <p> footer del blog </p> </footer>    
</body>
</html>