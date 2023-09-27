@extends('layouts.app')

@section('content')
    <div class="container">
        @include('agent.alert.alert')

        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-center mb-20">
                            <h4 class="card-title mb-0">{{ __('Travel Packages') }}</h4>
                            <div>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#travelPackageModal">+ {{ __('Add Travel Package') }}</button>
                            </div>
                        </div>
                        @if (count($travel_packages) > 0)
                            <div class="mr-3">
                                <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                                <label for="check_all">{{ __('Check All') }}</label>
                                <a id="deleteChecked" class="ml-2" href="#" data-bs-toggle="modal" data-bs-target="#deleteCheckedModal">
                                    <i class="fa fa-trash text-danger font-18"></i>
                                </a>
                            </div>
                            <form onsubmit="return btnCheckListGet()" action="{{ route('agent.travel_package.destroy_checked') }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" id="checked_lists" name="checked_lists" value="">
    
                                <!-- Modal -->
                                <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCheckedModalCenterTitle">
                                                    {{ __('Delete') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('Delete Selected?') }}
                                            </div>
                                            <div class="modal-footer">
                                                <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('Yes delete it!') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Destination') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Duration') }}</th>
                                        <th class="custom-width-action">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $desc = count($travel_packages);
                                        $asc = 0;
                                    @endphp
                                    @foreach ($travel_packages as $travel_package)
                                        <tr>
                                            <td>
                                                <input name="check_list[]" type="checkbox" value="{{ $travel_package->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                            </td>
                                            <td>
                                                @if (!empty($travel_package->package_image))
                                                    <img class="image-size img-fluid"
                                                        src="{{ asset('uploads/' . $travel_package->package_image) }}"
                                                        alt="Travel Package image">
                                                @else
                                                    <img class="image-size img-fluid"
                                                        src="{{ asset('assets/images/no-image.jpg') }}" alt="no image">
                                                @endif
                                            </td>
                                            <td>{{ $travel_package->package_name }}</td>
                                            <td>{{ $travel_package->destination }}</td>
                                            <td>{{ $travel_package->price }}</td>
                                            <td>{{ $travel_package->duration }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('agent.travel_package.edit', $travel_package->id) }}" class="mr-2">
                                                        <i class="fa fa-edit text-info font-18"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $travel_package->id }}">
                                                        <i class="fa fa-trash text-danger font-18"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
    
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $travel_package->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="travelPackageModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="travelPackageModalCenterTitle">
                                                            {{ __('Delete') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        {{ __('You will not be able to revert this.') }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form class="d-inline-block"
                                                            action="{{ route('agent.travel_package.destroy', $travel_package->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">{{ __('Yes delete it!') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>{{ __('No record found') }}</span>
                        @endif
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="travelPackageModal" tabindex="-1" role="dialog" aria-labelledby="travelPackageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="serviceModalLabel">{{ __('Add New') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agent.travel_package.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="package_image">{{ __('Image') }} ({{ __('Size') }} 500 x 500)(.jpg, .jpeg, .png)</label>
                                    <input type="file" name="package_image" class="form-control-file" id="package_image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="package_name">{{ __('Package Name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="package_name" class="form-control" id="package_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="destination">{{ __('Destination') }} <span class="text-red">*</span></label>
                                    <input type="text" name="destination" class="form-control" id="destination" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input type="number" name="price" class="form-control" id="price" value="0" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="duration">{{ __('Duration') }}</label>
                                    <input type="text" name="duration" class="form-control" id="duration" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
