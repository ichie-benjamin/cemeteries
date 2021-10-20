<?php

namespace App\Http\Controllers;

use App\Imports\CemeteriesImport;
//use App\Imports\CemeteryImport;
//use App\QuestionImport;
use App\Imports\CemeteryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CommonController extends Controller
{
    public function importCemeteries(Request $request){
        $request->validate([
            'import_file' => 'required|mimes:csv,txt'
        ]);
        Excel::import(new CemeteryImport, request()->file('import_file'));

        return back()->with('success_message', 'Cemeteries was successfully imported.');
    }
}
