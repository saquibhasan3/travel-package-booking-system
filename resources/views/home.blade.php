@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (count($travel_packages) > 0)
                        <div class="card-header">{{ __('Travel Packages') }}</div>
                        <div class="card-body">
                            <div class="container m-4">
                                <div class="row">
                                    @foreach ($travel_packages as $package)
                                    <div class="col-md-4">

                                        <div class="card border-0 rounded-0 shadow">
                                            <a href="{{ route('travel_package.details', ['package_slug' => $package->package_slug]) }}">
                                                <img src="{{ asset('uploads/'.$package->package_image) }}" onerror="this.src='{{ asset('assets/images/no-image.jpg') }}'" class="card-img-top rounded-0" alt="Travel Package Image">
                                            </a>
                                            <div class="card-body mt-3 mb-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="card-title">
                                                            <a href="{{ route('travel_package.details', ['package_slug' => $package->package_slug]) }}" class="nostyle">
                                                                {{ $package->package_name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center text-center g-0">
                                                <div class="col-6">
                                                    <h5><i class="fa fa-inr"></i> {{ $package->price }}</h5>
                                                </div>
                                                <div class="col-6">
                                                    <a href="{{ route('travel_package.details', ['package_slug' => $package->package_slug]) }}" class="btn btn-dark w-100 p-3 rounded-0 text-warning">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-header">{{ __('Travel Package Booking System') }}</div>
                        <div class="card-body">
                            {{ __('We don\'t have travel packages right now. Please check after sometime.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
