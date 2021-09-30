<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $res_id = Restaurant::whereUserId(auth()->id())->pluck('id');
        $data['total_menu'] = Menu::whereIn('restaurant_id', $res_id)->count();
        $data['total_res'] = count($res_id);
        return view('res.dashboard', compact('data'));
    }
}
