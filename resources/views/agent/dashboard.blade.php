@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Agent Dashboard') }}</div>
                    <div class="card-body">
                        {{-- <h2 class="py-5"></h2> --}}
                        @if ($agent->travel_packages()->exists())
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Destination') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Duration') }}</th>
                                        <th>{{ __('Bookings') }}</th>
                                    </tr>
                                </thead>
                                <tbody>        
                                    @foreach ($agent->travel_packages as $package)
                                        <tr>
                                            <td>{{ $package->package_name }}</td>
                                            <td>{{ $package->destination }}</td>
                                            <td>{{ $package->price }}</td>
                                            <td>{{ $package->duration }}</td>
                                            <td>{!!  $package->bookings()->exists() ? '<a href="javascript:;" class="btn btn-sm btn-success bookingsDetailModalButton" data-bs-toggle="modal" data-bs-target="#packageDetailModal" data-package="'.$package->id.'">'.count($package->bookings).'</a>' : 0 !!} </td>
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
    
    <div class="modal fade" id="packageDetailModal" tabindex="-1" role="dialog" aria-labelledby="packageDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageDetailModalLabel">{{ __('Package Bookings Details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="packageDetailModalBody"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    
    $(".bookingsDetailModalButton").on('click', function() {
        var package = $(this).data('package');
        $("#packageDetailModalBody").html("<center><h5>Please Wait....</h5></center>");
        $.ajax({
            url:"{{ route('agent.package_bookings') }}",
            type: "POST",
            data: {package: package, _token: "{{ csrf_token() }}"},
            success:function(result){
                console.log(result);
                $("#packageDetailModalBody").html(result);
            }
        }); 
    });

</script>
@endsection