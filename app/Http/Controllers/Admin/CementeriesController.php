<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cementery;
use Illuminate\Http\Request;

class CementeriesController extends Controller
{
    public function index()
    {
        $cemeteries = Cementery::paginate(100);

        return view('admin.cemeteries.list', compact('cemeteries'));
    }

    public function create()
    {
        return view('admin.cemeteries.create');
    }

    public function store(Request $request)
    {

        $data = $this->getData($request);

        Cementery::create($data);

        return redirect()->route('admin.cemeteries.index')
            ->with('success_message', 'Cemetery was successfully added.');

    }

    public function show($id)
    {
        $cementery = Cementery::with('user')->findOrFail($id);

        views($cementery)->record();

        return view('admin.cementeries.show', compact('cementery'));
    }

    public function edit($id)
    {
        $cemetery = Cementery::findOrFail($id);
        return view('admin.cemeteries.edit', compact('cemetery'));
    }


    public function update($id, Request $request)
    {

        $data = $this->getData($request);

        $cemetery = Cementery::findOrFail($id);
        $cemetery->update($data);

        return redirect()->route('cemeteries.index')
            ->with('success_message', 'Cemetery was successfully updated.');

    }


    public function destroy($id)
    {
        try {
            $cementery = Cementery::findOrFail($id);
            $cementery->delete();

            return redirect()->route('cementeries.cementery.index')
                ->with('success_message', 'Cementery was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => 'nullable',
            'name' => 'string|min:1|max:255|nullable',
            'username' => 'string|min:1|max:255|unique:cementeries',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'country' => 'string|nullable',
            'address' => 'string|min:1|nullable',
            'longitude' => 'string|min:1|nullable',
            'latitude' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
            'approved' => 'string|min:1|nullable',
            'municipalities' => 'string|min:1|nullable',
            'website' => 'string|min:1|nullable',
            'image' => 'string|nullable',
            'logo' => 'string|nullable',
            'description' => 'string|nullable',
        ];

        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        return $data;
    }

}
