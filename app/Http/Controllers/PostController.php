<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(){

        return view('posts.index', ['posts' =>
                                        Post::latest()->paginate()
                                ]);
    }


    public function getPosts (){

        $posts = Post::latest()->paginate();
        return view('posts.getPosts', ['posts' => $posts]);
        
    }


    public function show(string $id){
        return view('posts.getPostShow', ['id' => $id]);
    }

    public function formNewPost(){
        return view('posts.formCreatePost', ['post' => null]);
    }

    public function postPost(Request $request){
        
        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body,
        ]);

        return redirect('posts');

    }

    public function formEditPost(string $id){

        $post = Post::find($id);

        return  view('posts.formEditPost', ['post' => $post]);
    }

    public function putPost(Request $request, $id){

        $post = Post::find($id);

        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body,
        ]);


        return redirect('posts');
    }

    public function deletePost ($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts');
    }
}
