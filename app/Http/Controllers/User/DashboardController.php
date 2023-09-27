<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TravelPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function package_book($id, Request $request){
        $request->validate([
            'total_person' => 'required|numeric|gt:0',
        ]);
        
        $package = TravelPackage::findOrFail($id);
        $total_price = $package->price * $request->total_person;

        $booking = new Booking();
        $booking->booking_number = Str::random(4).now()->format('dmY');
        $booking->user_id = auth('user')->user()->id;
        $booking->travel_package_id = $id;
        $booking->total_person = $request->total_person;
        $booking->package_price = $package->price;
        $booking->total_amount = $total_price;
        $booking->name = auth('user')->user()->name;
        $booking->contact = auth('user')->user()->email;
        $booking->travel_date = date('Y-m-d', strtotime($request->travel_date));
        $booking->save();

        return redirect()->route('user.bookings')->with('success', 'Order place has been successfully');
    }

    function bookings() {
        $user = User::with('bookings')->find(auth('user')->user()->id);
        return view('user.bookings', compact('user'));
    }
}
