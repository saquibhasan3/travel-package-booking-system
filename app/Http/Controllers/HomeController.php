<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $travel_packages = TravelPackage::all();
        return view('home', compact('travel_packages'));
    }

    public function travel_package(Request $request)
    {
        $travel_package = TravelPackage::where('package_slug', $request->package_slug)->first();
        if (!$travel_package) {
            abort('404', 'Package not found!');
        }
        return view('package-details', compact('travel_package'));
    }

}
