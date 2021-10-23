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
    public function import1(Request $request){

        Excel::import(new CemeteriesImport, public_path('csvs/csv1.csv'));

        return redirect()->route('admin.cemeteries.index')->with('success_message', 'Cemeteries was successfully imported.');
    }
    public function import2(Request $request){

        Excel::import(new CemeteriesImport, public_path('csvs/csv2.csv'));

        return redirect()->route('admin.cemeteries.index')->with('success_message', 'Cemeteries was successfully imported.');
    }
    public function import3(Request $request){

        Excel::import(new CemeteriesImport, public_path('csvs/csv3.csv'));

        return redirect()->route('admin.cemeteries.index')->with('success_message', 'Cemeteries was successfully imported.');
    }
    public function importId($id){
        $file = 'csvs/ceme6-'.$id.'.csv';

        Excel::import(new CemeteriesImport, public_path($file));

        return  'success';

//        return redirect()->route('admin.cemeteries.index')->with('success_message', 'Cemeteries was successfully imported.');
    }
}
