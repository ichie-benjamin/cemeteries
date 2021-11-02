<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Image;
use App\Models\Memorial;
use App\Models\Role;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function seedRole(){
        $isCeme = Role::whereName('cemetery')->first();
        if(!$isCeme){
            $ceme = Role::create([
                'name' => 'cemetery',
                'display_name' => 'Cemetery Owner', // optional
                'description' => 'User is the owner of a given cemetery', // optional
            ]);
        }
        $isV = Role::whereName('volunteer')->first();
        if(!$isV){
            $volunteer = Role::create([
                'name' => 'volunteer',
                'display_name' => 'volunteer', // optional
                'description' => 'User is a volunteer', // optional
            ]);
        }

        return 'done';

    }
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $cemeteries = Cementery::latest()->paginate(8);
        return view('home', compact('cemeteries'));
    }
    public function photos()
    {
        $photos = Image::whereUserId(auth()->id())->get();
        return view('user.photos', compact('photos'));
    }
    public function setRole(){
        return view('auth.set_role');
    }
    public function setUserRole($role){
        $user = Auth::user();
        if($user->hasRole('cemetery') || $user->hasRole('volunteer')){
            $user->role_set = true;
            $user->save();
            return redirect()->route('dashboard');
        }
        $role = Role::where('name', $role)->first();
        $user->attachRole($role);
        $user->role_set = true;
        $user->save();
        return redirect()->route('dashboard');
    }
    public function addCemetery(){
        return view('user.cemeteries.search');
    }
    public function dashboard()
    {
        if(auth()->user()->hasRole(['cemetery']) && auth()->user()->cemeteries_count < 2){
            return redirect()->route('user.addcemetery');
        }
        if(auth()->user()->hasRole(['admin','superadmin'])){
            return redirect()->route('admin.dashboard');
        }
        if(!auth()->user()->role_set){
            return redirect()->route('user.set_role');
        }
        $cemeteries = Cementery::whereUserId(auth()->id())->get();

        foreach($cemeteries as $item) {
            $item->unique_views_count = views($item)->unique()->count();
            $item->views_count = views($item)->count();
            $item->today_views_count = views($item)->period(Period::since(Carbon::today()))->count();
            $item->today_unique_views_count = views($item)->period(Period::since(Carbon::today()))->unique()->count();
            $item->save();
        }


        $data['total_cemeteries'] = Cementery::whereUserId(auth()->id())->count();
        $data['total_memorials'] = Memorial::whereUserId(auth()->id())->count();
        $data['photos'] = Image::whereUserId(auth()->id())->count();
        $data['cemeteries'] = $cemeteries;

        $data['total_cemeteries_views'] = Cementery::whereUserId(auth()->id())->sum('views_count');
        $data['total_cemeteries_u_views'] = Cementery::whereUserId(auth()->id())->sum('unique_views_count');
        $data['total_cemeteries_today_views'] = Cementery::whereUserId(auth()->id())->sum('today_views_count');
        $data['total_cemeteries_today_u_views'] = Cementery::whereUserId(auth()->id())->sum('today_unique_views_count');

        return view('user.dashboard', compact('data'));
    }
}
