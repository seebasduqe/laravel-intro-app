@extends('layaouts.plantilla')

@section('content')
    <div class="bg-gray-900 px-20 py-16 rounded-lg mb-8 relative overflow-hidden">
        <span class="text-xs uppercase text-gray-700 bg-gray-400 rounded-full px-2 py-1"> Desarrollo laravel </span>
        <h1 class="text-3xl text-white mt-4">blog</h1>
        <p class="text-sm text-gray-400 mt-2">Proyecto para e importar posts en excel</p>
        <img src="dev.png" alt="dev" class="absolute -right-20 -bottom-20 opacity-20" >
    </div>

    <div class="px-4">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-2xl mb-8 text-gray-900">Contenido tecnico</h1>


            <div class="flex flex-col bg-gray-200">
                <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">
                    <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">
                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <a href=" {{ route('exportTwoSheet') }} ">
                                <div class="flex justify-between items-center">
                                    <div>  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> </div>
                                    <div>Descargar posts y usuarios</div>
                                </div>
                            </a>
                        </button>
                    </div>
                </div>



                <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">
                    
                    <form action="{{ route('exportPosts') }}" method="POST">
                        @csrf
                        <div class="flex flex-row bg-gray-200">
                            <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">
                                <label for="underline_select" class="sr-only">cfgngccccccccccc</label>
                                <select name="formato" class="py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>formato &nbsp &nbsp &nbsp &nbsp</option>
                                    <option value="XLSX">XLSX</option>
                                    <option value="CSV">CSV</option>
                                    <option value="TSV">TSV</option>    
                                    <option value="SAO">SAO</option>
                                    <option value="XLS">XLS</option>
                                    <option value="HTML">HTML</option>
                                </select>
                            </div>
                            <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">
                                <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    Descargar posts 
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-4 mb-4">
            @foreach ($posts as $post)
                <a href=" {{ route('posts.buscar', $post->id) }} " class="bg-gray-100 rounded-lg px-6 py-4">
                    <p class="text-xs flex items-center gap-2">
                        <span class="uppercase text-gray-700 bg-gray-200 rounded-full px-2 py-1"> post</span>
                        <span> {{ $post->created_at->format('d/m/Y') }} </span>
                    </p>
                    <h2 class="text-lg text-gray-900 mt-2"> {{ $post->title }} </h2>
                    <div  class="text-xs text-gray-900 opacity-75 flex items-center gap-1">
                       <img src="profile.png" width="20" height="20"> {{$post->user->name}}
                    </div>
                </a>
            @endforeach
            {{$posts->links()}}
        </div>

    </div>

@endsection
