<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function importView(Request $request){
        return view('excelView.importFile');
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
