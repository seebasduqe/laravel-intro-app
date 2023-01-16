<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use App\Models\Post;
use App\Models\User;

class ExportPostYuser implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {

        $postsYusers = [new ExportPost, new ExportUser];

       return $postsYusers; 
    }
}
