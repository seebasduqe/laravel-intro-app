<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function buscar(Request $request){

        $valorAbuscar = $request->buscar;

        $posts = Post::where('title', 'LIKE', "%{$valorAbuscar}%")->latest()->paginate();

        return view('post', ['posts' => $posts]);
    }
}
