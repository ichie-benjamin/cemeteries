<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Image;
use App\Models\Memorial;
use App\Models\User;
use Illuminate\Http\Request;

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
        $links = ['General Info','Password','Email','Photo Volunteer','Follower Settings','Notifications','Site preferences','Data & Privacy'];
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
