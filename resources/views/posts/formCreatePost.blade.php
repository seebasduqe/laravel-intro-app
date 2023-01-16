<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('posts.postPost') }}" method="POST">
                        @csrf
                        <label class="uppercase text-gray-700 text-xs">Titulo</label>
                        <span class="text-xs text-red-600"> @error('title') {{ $message }}  @enderror </span>
                        <input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{old('title')}}" placeholder="escribe el titulo">
                    
                        <label class="uppercase text-gray-700 text-xs">Contenido</label>
                        <span class="text-xs text-red-600"> @error('body') {{ $message }}  @enderror </span>
                        <textarea name="body"  rows="5" class="rounded border-gray-200 w-full mb-4" value="{{old('body')}}" placeholder="escribe el post"></textarea>
                    
                        <div class="flex justify-between items-center">
                            <a href="{{ route('posts.index') }}" class="text-indigo-600"></a>
                            <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
