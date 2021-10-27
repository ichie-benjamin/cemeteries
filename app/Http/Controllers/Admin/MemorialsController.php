<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cementery;
use App\Models\Image;
use App\Models\Memorial;
use Illuminate\Http\Request;

class MemorialsController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('cemetery')){
            $c_id = $request->get('cemetery');
            $cemetery = Cementery::findOrFail($c_id);
            $title = $cemetery->name. ' Memorials';
            $memorials = Memorial::whereCemeteryId($c_id)->paginate(100);
        }else{
            $title = "Manage Memorials";
            $memorials = Memorial::paginate(200);
        }

        return view('admin.memorials.list', compact('memorials','title'));
    }

    public function storePhoto(Request $request){
        $photo = new Image();
        $photo->user_id = auth()->id();
        $photo->memorial_id = $request['memorial_id'];
        $photo->name = $request['name']; $photo->path = $request['image'];
        $photo->type = $request['type'];
        $photo->save();
        return redirect()->back()
            ->with('success_message', 'Memorial Photo was successfully added.');

    }

    public function photos($id)
    {
        $memorial = Memorial::findOrFail($id);
        $photos = Image::whereMemorialId($id)->get();
        return view('user.memorials.photos', compact('memorial','photos'));
    }

    public function create()
    {
        $months = $this->months();
        $cemeteries = Cementery::all();
        if(count($cemeteries) < 1){
            return redirect()->route('admin.cemeteries.create')->with('success_message', 'Create a cemetery first');
        }
        $prefix = ['Mrs','Doctor','Judge','Deacon','Elder', 'Rabbi',' Rev','Rev Fr','Br','Sr'];
        $sufix = ['Jr','Sr','i','ii','iii','iv','vi','vi'];
        return view('admin.memorials.create', compact('cemeteries','prefix','sufix','months'));
    }

    public function store(Request $request)
    {

        $data = $this->getData($request);

        $memorial = Memorial::create($data);

        return redirect()->route('memorials.photos', $memorial->id)
            ->with('success_message', 'Memorial was successfully added, add photos');

    }


    public function show($id)
    {

        $memorial = Memorial::findOrFail($id);

        return view('memorials.show', compact('memorial'));
    }


    public function edit($id)
    {
        $months = $this->months();
        $cemeteries = Cementery::all();
        $prefix = ['Mrs','Doctor','Judge','Deacon','Elder', 'Rabbi',' Rev','Rev Fr','Br','Sr'];
        $sufix = ['Jr','Sr','i','ii','iii','iv','vi','vi'];
        $memorial = Memorial::findOrFail($id);
        return view('admin.memorials.edit', compact('memorial','sufix','prefix','cemeteries','months'));
    }

    public function update($id, Request $request)
    {

        $data = $this->getData($request);
        $memorial = Memorial::findOrFail($id);
        $memorial->update($data);

        return redirect()->route('admin.memorials.index')
            ->with('success_message', 'Memorial was successfully updated.');

    }


    public function destroy($id)
    {
        try {
            $memorial = Memorial::findOrFail($id);
            $memorial->delete();

            return redirect()->route('memorials.memorial.index')
                ->with('success_message', 'Memorial was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => 'string|min:1|nullable',
            'last_name' => 'string|min:1|nullable',
            'middle_name' => 'string|min:1|nullable',
            'nickname' => 'string|min:1|nullable',
            'maiden_name' => 'string|min:1|nullable',
            'gender' => 'string|min:1|nullable',
            'birth_day' => 'string|min:1|nullable',
            'birth_month' => 'string|min:1|nullable',
            'birth_year' => 'string|min:1|nullable',
            'death_day' => 'string|min:1|nullable',
            'death_month' => 'string|min:1|nullable',
            'death_year' => 'string|min:1|nullable',
            'birth_location' => 'string|min:1|nullable',
            'death_location' => 'string|min:1|nullable',
            'bio' => 'string|min:1|nullable',
            'prefix' => 'string|min:1|nullable',
            'cemetery_id' => 'required',
            'is_famous' => 'required',
            'suffix' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        return $data;
    }

}
