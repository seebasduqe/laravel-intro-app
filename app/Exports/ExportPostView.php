<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Post;

class ExportPostView implements FromView
{
    public function view(): View
    {
        return view('home',  ['posts' => Post::latest()->with('user')]);
    }
}
