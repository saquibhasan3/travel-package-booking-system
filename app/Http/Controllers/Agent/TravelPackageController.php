<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TravelPackageController extends Controller
{
    public function create()
    {
        $travel_packages = TravelPackage::orderBy('id', 'desc')->get();
        return view('agent.travel_package.create', compact('travel_packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'destination' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric|between:0,9999999999.99',
            'description' => 'required',
            'package_image' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
        $input = $request->all();

        if($request->hasFile('package_image')){
            $package_image = $request->file('package_image');
            $folder = config('global.uploads_dir');
            $package_image_name =  time().'-'.$package_image->getClientOriginalName();
            $package_image->move($folder, $package_image_name);
            $input['package_image']= $package_image_name;
        } else {
            $input['package_image']= null;
        }
        
        TravelPackage::create([
            'package_name' => $input['package_name'],
            'destination' => $input['destination'],
            'duration' => $input['duration'],
            'price' => $input['price'],
            'description' => $input['description'],    
            'package_image' => $input['package_image'],
            'created_by' => Auth::guard('agent')->user()->id,
        ]);
        return redirect()->route('agent.travel_package.create')->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $travel_package = TravelPackage::findOrFail($id);
        return view('agent.travel_package.edit', compact('travel_package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required',
            'destination' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric|between:0,9999999999.99',
            'description' => 'required',
            'package_image' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
        $travel_package = TravelPackage::find($id);

        $input = $request->all();

        if($request->hasFile('package_image')){
            $package_image = $request->file('package_image');
            $folder = config('global.uploads_dir');
            $package_image_name =  time().'-'.$package_image->getClientOriginalName();
            File::delete(public_path($folder.$travel_package->package_image));
            $package_image->move($folder, $package_image_name);
            $input['package_image'] = $package_image_name;
        }

        $travel_package->update($input);
        return redirect()->route('agent.travel_package.create')->with('success', 'Updated successfully');
    }
    
    public function destroy($id)
    {
        $travel_package = TravelPackage::find($id);
        $folder = config('global.uploads_dir').'img/travel_packages/';
        File::delete(public_path($folder.$travel_package->package_image));
        $travel_package->delete();
        return redirect()->route('agent.travel_package.create')->with('success', 'Deleted successfully');
    }
    
    public function destroy_checked(Request $request)
    {
        $input = $request->input('checked_lists');
        $arr_checked_lists = explode(",", $input);
        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('agent.travel_package.create')
                ->with('warning', 'Please choose');
        }
        foreach ($arr_checked_lists as $id) {
            $travel_package = TravelPackage::findOrFail($id);
            $folder = config('global.uploads_dir').'img/travel_packages/';
            File::delete(public_path($folder.$travel_package->package_image));
            $travel_package->delete();
        }
        return redirect()->route('agent.travel_package.create')->with('success', 'Deleted successfully');
    }
}
