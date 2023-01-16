<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite('resources/js/app.js')
</head>
<body>

    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href=" {{ route('home') }} ">
                    <img src="sebas.png" class="h-12">
                </a>
                <form action="{{ route('home.buscar') }}" method="GET">
                    <input type="text" name="buscar" placeholder="buscar" value="{{ request('buscar') }}">
                </form>

            </div>
    
            @auth
            <a href="{{ route('posts.index') }}">Posts</a>
            <a href=" {{ route('dashboard') }} "> dahboard </a>    
            @else
            <a href=" {{ route('login') }} ">Login</a>
            @endauth
        </header>
    </div>

    <div class="opacity-60 h-px mb-8" style="
        background: linear-gradient(to right,
            rgba(200, 200, 200, 0) 0%,
            rgba(200, 200, 200, 1) 30%,
            rgba(200, 200, 200, 1) 70%,
            rgba(200, 200, 200, 0) 100%
        );
        ">

    </div>

     @yield('content')

     <footer> <p> footer del blog </p> </footer>    
</body>
</html>