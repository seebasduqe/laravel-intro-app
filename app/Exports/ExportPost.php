<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Post;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportPost implements FromCollection, WithBackgroundColor, WithStyles, WithColumnWidths
{

    //Estilismo

    public function styles(Worksheet $sheet)
    {
        return [

            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]], 

        ];
    }


    //Ancho de columna
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45
        ];
    }


    // Cambiarle el color al fondo

    public function backgroundColor(){
        return 'BEDCF2';
    }

    public function collection()
    {
        return Post::select('posts.title', 'posts.body', 'users.name')->join('users', 'users.id', '=', 'posts.user_id')->get();
    }
}
