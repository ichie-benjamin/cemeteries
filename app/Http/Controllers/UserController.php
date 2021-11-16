<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Image;
use App\Models\Memorial;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editProfile(){
        $user = auth()->user();
        return view('user.profile.edit', compact('user'));
    }
    public function findMember(Request $request){
        $users = [];

        if($request->get('name')){
          $name = $request->get('name');
            $users = User::where('first_name', 'like', '%'.$name.'%')
                ->orWhere('username', 'like', '%'.$name.'%')
                ->orWhere('first_name', 'like', '%'.$name.'%')->paginate(40);
        }elseif ($request->get('name')) {
            $users = User::where('id', $request->get('id'))->get();
        }

        return view('user.profile.find_user', compact('users'));
    }

    public function memorials($id, Request $request){
        $memorial = Memorial::whereUserId($id);
        $user = User::findOrFail($id);
        if($request->get('name')){
          $name = $request->get('name');
            $memorial->where('first_name', 'like', '%'.$name.'%')
                ->orWhere('middle_name', 'like', '%'.$name.'%')
                ->orWhere('first_name', 'like', '%'.$name.'%');
        }
        if($request->get('location')){
          $location = $request->get('location');
            $memorial->where('address', 'like', '%'.$location.'%');
        }
        if($request->get('birth_year')){
          $birth = $request->get('birth_year');
            $memorial->where('birth_year', $birth);
        }
      if($request->get('death_year')){
          $death = $request->get('death_year');
            $memorial->where('death_year', $death);
        }

        $memorials = $memorial->paginate(50);

        return view('user.profile.memorials', compact('memorials','user'));
    }

    public function makeRequest($type){
        if($type = 'delete_account'){
            $name = 'Delete account request';
            $this->saveRequest(auth()->id(), $name,$type);
        }
        return redirect()->back()->with('success_message', $name.' successfully submited');
    }

    private function saveRequest($user_id, $name, $type){
        $request = new \App\Models\Request();
        $request->name = $name;
        $request->user_id = $user_id;
        $request->type = $type;
        $request->save();
    }

    public function updatePassword(Request $request){
        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->route('user.account',['t' => 'password'])->with('error_message','Your current password does not matches with the password you provided. Please try again.');
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->route('user.account',['t' => 'password'])->with('error_message','New Password cannot be same as your current password. Please choose a different password');
        }
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);
        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with('success_message','Password successfully updated');
    }

    public function updateEmail(Request $request){
        if (!(Hash::check($request->get('password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->route('user.account',['t' => 'email'])->with('error_message','Your current password does not matches with the password you provided. Please try again.');
        }
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        //Change Password
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success_message','Email successfully updated');
    }

    public function updateNotifications(Request $request){

        return  $request->all();
        return redirect()->back()->with('success_message','Email successfully updated');
    }

    public function updateTheme(Request $request){
        $this->checkSettings();
        $setting = UserSetting::whereUserId(auth()->id())->first();
        $setting->theme = $request['theme'];
        $setting->save();
        return redirect()->route('user.account',['t' => 'site_preferences'])->with('success_message','Theme successfully updated');
    }

    public function profile($id){
        $user = User::findOrFail($id);
        $data['photos'] = Image::whereUserId($user->id)->count();
        $data['memorials'] = Memorial::select('user_id')->whereUserId($user->id)->count();
        $data['followings'] = $user->followings;
        $data['v_cemeteries'] = Cementery::select('user_id','virtual')->whereUserId($user->id)->whereVirtual(1)->count();
        return view('user.profile.index', compact('user','data'));
    }

    public function account(){
        $user = auth()->user();
        $links = ['general info','password','email','Photo Volunteer','Follower Settings','notifications','site preferences','data and privacy'];
        $data['photos'] = Image::whereUserId(auth()->id())->count();
        $data['memorials'] = Memorial::select('user_id')->whereUserId(auth()->id())->count();
        $data['followings'] = $user->followings;
        $data['v_cemeteries'] = Cementery::select('user_id','virtual')->whereUserId(auth()->id())->whereVirtual(1)->count();
        return view('user.profile.account', compact('user','data','links'));
    }

    public function toggleFollow($id){
        $user = User::findOrFail($id);
        auth()->user()->toggleFollow($user);
        return redirect()->back();
    }

    public function updateProfile(Request $request){
        $data = $this->getData($request);
        $user = User::findOrFail(auth()->id());
        if($request->get('avatar')){
            $data['avatar'] = $request['avatar'];
        }
        $user->update($data);
        return redirect()->back()->with('success_message', 'Profile was successfully updated.');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => 'string|min:1|nullable',
            'last_name' => 'string|min:1|nullable',
            'bio' => 'string|min:1|nullable',
        ];
        return $request->validate($rules);
    }
}
