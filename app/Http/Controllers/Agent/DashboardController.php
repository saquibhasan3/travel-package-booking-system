<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $agent = Agent::with('travel_packages')->find(auth('agent')->user()->id);
        return view('agent.dashboard', compact('agent'));
    }

    function package_bookings(Request $request) {
        $package = TravelPackage::findOrFail($request->package);
        $html = '';
        $html .= '<table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">'.__('Booking Number') .'</th>
                <th scope="col">'.__('User Name') .'</th>
                <th scope="col">'.__('Contact') .'</th>
                <th scope="col">'.__('Travel Date') .'</th>
                <th scope="col">'.__('No. Of Person') .'</th>
                <th scope="col">'.__('Total Amount') .'</th>
            </tr>
        </thead>
        <tbody>';
        if ($package->bookings()->exists()):
            foreach ($package->bookings as $booking) :
                $html .= '<th scope="row">'. $booking->booking_number .'</th>
                <td>'. $booking->name .'</td>
                <td>'. $booking->contact .'</td>
                <td>'. date('d-m-Y', strtotime($booking->travel_date)) .'</td>
                <td>'. $booking->total_person .'</td>
                <td><i class="fa fa-inr"></i>'. $booking->total_amount .'</td>';
            endforeach;
        endif;
        echo $html;
    }
}