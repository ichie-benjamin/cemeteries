<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function memorials(){
        $memorials = [
            [],[],[],[], [],[], [],[], [],[], [],[]
        ];
        return view('pages.memorials', compact('memorials'));
    }

    public function cemeteries(){
        $cemeteries = [
            [],[],[],[],[],  [],[],[],[],[],  [],[],[],[],[],
        ];
        return view('pages.cemeteries',compact('cemeteries'));
    }

    public function cemeteriesList(){
        $cemeteries = [
            [],[],[],[],[],  [],[],[],[],[],  [],[],[],[],[],
        ];
        return view('pages.cemeteries_listing', compact('cemeteries'));
    }

    public function help(){
        return 'learning';
    }

}
