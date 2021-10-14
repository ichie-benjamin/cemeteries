<?php

namespace App\Http\Controllers;

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
