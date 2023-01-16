<?php

namespace App\Http\Controllers;

use App\Exports\ExportPost;
use App\Exports\ExportPostView;
use App\Exports\ExportPostYuser;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class PostController extends Controller
{

    public function index(){

        return view('posts.index', ['posts' =>
                                        Post::latest()->paginate()
                                ]);
    }

    public function show(string $id){

        $post = Post::find($id);

        return view('posts.getPostShow', ['post' => $post]);
    }

    public function formNewPost(){
        return view('posts.formCreatePost', ['post' => null]);
    }

    public function postPost(Request $request){
        
        $request->validate([
            'title' => 'required | unique:posts',
            'body' => 'required'
        ]);

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


    public function exportPosts(Request $request){

        $formato = $request->formato;

        switch($formato){
            case 'XLSX':
                return Excel::download(new ExportPost, 'posts.xlsx');
                break;
            case 'CSV':
                return Excel::download(new ExportPost, 'posts.csv', \Maatwebsite\Excel\Excel::CSV);
                break;
            case 'TSV':
                return Excel::download(new ExportPost, 'posts.tsv', \Maatwebsite\Excel\Excel::TSV);
                break;
            case 'SAO':
                return Excel::download(new ExportPost, 'posts.ods', \Maatwebsite\Excel\Excel::ODS);
                break;
            case 'XLS':
                return Excel::download(new ExportPost, 'posts.xls', \Maatwebsite\Excel\Excel::XLS);
                break;
            case 'HTML':
                return Excel::download(new ExportPost, 'posts.html', \Maatwebsite\Excel\Excel::HTML);
                break;;
        }
    }

    public function exportTwoSheet(){
       return Excel::download(new ExportPostYuser, 'postsyusers.xlsx');
    }
}
