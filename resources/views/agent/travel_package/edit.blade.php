@extends('layouts.app')

@section('content')

    <div class="container">
        @include('agent.alert.alert')

        <div class="row">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h4 class="card-title">{{ __('Edit Travel Package') }}</h4>
                        <div>
                            <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fa fa-angle-left"></i> {{ __('Back') }}</a>
                        </div>
                    </div>
                        <form action="{{ route('agent.travel_package.update', $travel_package->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="package_image">{{ __('Image') }} ({{ __('Size') }} 500 x 500) (.jpg, .jpeg, .png)</label>
                                        <input type="file" name="package_image" class="form-control-file" id="package_image">
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($travel_package->package_image))
                                                            <a  class="d-block mx-auto" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="{{ __('Current Image') }}">
                                                                <img src="{{ asset('uploads/'.$travel_package->package_image) }}" alt="Travel Package image" class="rounded">
                                                            </a>
                                                        @else
                                                            <a class="d-block mx-auto" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="{{ __('No record found') }}">
                                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="package_name">{{ __('Package Name') }} <span class="text-red">*</span></label>
                                        <input type="text" name="package_name" class="form-control" id="package_name" value="{{ $travel_package->package_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="destination">{{ __('Destination') }} <span class="text-red">*</span></label>
                                        <input type="text" name="destination" class="form-control" id="destination" value="{{ $travel_package->destination }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">{{ __('Price') }}</label>
                                        <input type="number" name="price" class="form-control" id="price" value="{{ $travel_package->price }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="duration">{{ __('Duration') }}</label>
                                        <input type="text" name="duration" class="form-control" id="duration" value="{{ $travel_package->duration }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea type="text" name="description" class="form-control" id="description">{{ $travel_package->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection