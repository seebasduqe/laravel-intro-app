@extends('layaouts.plantilla')

@section('content')
    <div>
        <h1>hello aqui estan todos los posts</h1>

        @foreach ($posts as $post)
            <h5> {{ $post->title }} </h5>
            <p> {{ $post->body }} </p>
            <p> usuario: {{ $post->user->name }} </p>
            <hr>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection