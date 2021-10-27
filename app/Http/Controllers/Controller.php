<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Restaurant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function months(){
        return ['January','Febuary','March','April','May','June','July','August','September','October','November','December'];
    }

    public function queryCemetery($request){
        $cemeteries = Cementery::latest();
        if($request->get('name')){
            $cemeteries->where('name', 'like', '%'.$request->get('name').'%');
        }
        if($request->get('country')){
            $cemeteries->where('country', 'like', '%'.$request->get('country').'%');
        }
        if($request->get('state')){
            $cemeteries->where('state',$request->get('state'));
        }
        if($request->get('from_date') && $request->get('to_date')){
            $from = date($request->get('from_date'));
            $to = date($request->get('to_date'));
            $cemeteries->whereBetween('created_at', [$from, $to]);
        }


        return $cemeteries;
    }

    public function resizeImage($file, $path)
    {
        $resize = Image::make($file)->resize(400, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $resize->save($path);

    }

    public function getRes(){
        return Restaurant::whereUserId(auth()->id())->get();
    }
}
