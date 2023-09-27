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
        if (env('APP_NAME') != "Travel Package Booking System") {
            $this->changeEnvironmentVariable('APP_NAME', 'Travel Package Booking System');
        }
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
    public static function changeEnvironmentVariable($key,$value)
    {
        $path = base_path('.env');
        if(is_bool(env($key)))
        {
            $old = env($key)? 'true' : 'false';
        }
        elseif(env($key)===null){
            $old = 'null';
        }
        else{
            $old = env($key);
        }
    
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".'"'.$value.'"', file_get_contents($path)
            ));
        }
    }
}
