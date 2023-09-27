@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"
        href="{{ asset('assets/datepicker/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="card details-card p-0">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img class="img-fluid details-img" src="{{ asset('uploads/' . $travel_package->package_image) }}"
                        onerror="this.src='{{ asset('assets/images/no-image.jpg') }}'" alt="Package Image">
                </div>
                <div class="col-md-6 col-sm-12 description-container p-5">
                    <div class="main-description">
                        <h3>{{ $travel_package->package_name }}</h3>
                        <hr>
                        <p class="product-price"><i class="fa fa-inr"></i> {{ $travel_package->price }}</p>
                        <form class="add-inputs" method="post"
                            action="{{ route('user.package.book', ['id' => $travel_package->id]) }}">
                            @csrf
                            <h5>{{ __('Travel Date') }}</h5>
                            <input type="text" readonly class="form-control" id="travel_date" name="travel_date"
                                value="{{ date('d-m-Y') }}" required>
                            <h5>{{ __('Total Person') }}</h5>
                            <input type="number" class="form-control input" id="total_person" name="total_person"
                                value="1" min="1" max="10" required>
                            <button name="book_now" type="submit"
                                class="btn btn-primary btn-lg">{{ __('Book Now!') }}</button>
                        </form>
                        <div style="clear:both"></div>
                        <hr>
                        <p class="product-title mt-4 mb-1">{{ __('Destination Details') }}</p>
                        <p class="product-description mb-4">
                            {{ $travel_package->destination }}
                        </p>
                        <hr>
                        <p class="product-title mt-4 mb-1">{{ __('About package') }}</p>
                        <p class="product-description mb-4">
                            {{ $travel_package->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ asset('assets/datepicker/datepicker.min.js') }}"></script>
        <script>
            $(function(){
                $('#travel_date').datepicker({
                    format: 'dd-mm-yyyy',
                    startDate: new Date()
                });
            });
            console.log('Test section');
        </script>
    @endsection
