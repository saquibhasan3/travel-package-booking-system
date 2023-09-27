@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Bookings') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($user->bookings()->exists())
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">{{ __('Booking Number') }}</th>
                                        <th scope="col">{{ __('Package') }}</th>
                                        <th scope="col">{{ __('Travel Date') }}</th>
                                        <th scope="col">{{ __('No. Of Person') }}</th>
                                        <th scope="col">{{ __('Total Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>        
                                    @foreach ($user->bookings as $booking)
                                        <tr>
                                            <th scope="row">{{ $booking->booking_number }}</th>
                                            <td>{{ $booking->travel_package->package_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($booking->travel_date)) }}</td>
                                            <td>{{ $booking->total_person }}</td>
                                            <td><i class="fa fa-inr"></i> {{ $booking->total_amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5 class="text-center">{{ __('You don\'t have bookings') }}</h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
