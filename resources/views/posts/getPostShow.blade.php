@extends('layaouts.plantilla')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h2 class="text-5xl mb-8"> {{$post->title}} </h2>
        <p class="leading-loose text-lg text-gray-700"> {{$post->body}} </p>
    </div>
@endsection