<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Memorial;
use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function memorials(){
        $memorials = Memorial::paginate(50);
        return view('pages.memorials', compact('memorials'));
    }

    public function viewCemetery($username){
        $cemetery = Cementery::with('memorials')->withCount('likers')->whereUsername($username)->firstOrFail();
        views($cemetery)->record();
        return view('pages.cemetery.view.default', compact('cemetery'));
    }

    public function cemeteries(){
        $cemeteries = Cementery::paginate(100);
        return view('pages.cemeteries',compact('cemeteries'));
    }

    public function cemeteriesList(){
        $cemeteries = Cementery::paginate(100);

        return view('pages.cemeteries_listing', compact('cemeteries'));
    }

    public function help(){
        return 'learning';
    }

}
