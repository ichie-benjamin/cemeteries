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
        return view('pages.cemeteries');
    }


}
