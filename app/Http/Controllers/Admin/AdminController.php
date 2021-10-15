<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cementery;
use App\Models\Image;
use App\Models\Memorial;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        $cemeteries = Cementery::all();

//        foreach($cemeteries as $item) {
//            $item->unique_views_count = views($item)->unique()->count();
//            $item->views_count = views($item)->count();
//            $item->today_views_count = views($item)->period(Period::since(Carbon::today()))->count();
//            $item->today_unique_views_count = views($item)->period(Period::since(Carbon::today()))->unique()->count();
//            $item->save();
//        }


        $data['total_cemeteries'] = Cementery::count();
        $data['total_memorials'] = Memorial::count();
        $data['photos'] = Image::count();
        $data['cemeteries'] = $cemeteries;

        $data['total_cemeteries_views'] = Cementery::sum('views_count');
        $data['total_cemeteries_u_views'] = Cementery::sum('unique_views_count');
        $data['total_cemeteries_today_views'] = Cementery::sum('today_views_count');
        $data['total_cemeteries_today_u_views'] = Cementery::sum('today_unique_views_count');

        return view('admin.dashboard', compact('data'));
    }

    public function photos()
    {
        $photos = Image::paginate(100);
        return view('admin.photos', compact('photos'));
    }

}
