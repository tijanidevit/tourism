@extends('layout.app')
@php
    $states = [
        'Abia',
        'Adamawa',
        'Akwa Ibom',
        'Anambra',
        'Bauchi',
        'Bayelsa',
        'Benue',
        'Borno',
        'Cross River',
        'Delta',
        'Ebonyi',
        'Edo',
        'Ekiti',
        'Enugu',
        'Gombe',
        'Imo',
        'Jigawa',
        'Kaduna',
        'Kano',
        'Katsina',
        'Kebbi',
        'Kogi',
        'Kwara',
        'Lagos',
        'Nasarawa',
        'Niger',
        'Ogun',
        'Ondo',
        'Osun',
        'Oyo',
        'Plateau',
        'Rivers',
        'Sokoto',
        'Taraba',
        'Yobe',
        'Zamfara',
    ];
@endphp
@section('extra-css')
    <link href="/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">All Destinations</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <x-success-alert />
            <form class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select value="{{ old('state') }}" type="state" name="state"
                            class="form-control select2" id="state">

                            <option value="">All</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}" {{ request()->state == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="search" name="search" value="{{request()->search}}" class="selectpicker show-tick form-control"
                            data-style="btn-secondary" placeholder="Search..." />
                    </div>
                </div>

                <div class="col-12 col-md-3 mb-4 text-center">
                    <button type="submit" class="btn btn-block btn-purple waves-effect waves-light"><i
                            class="mdi mdi-magnify mr-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        @forelse ($destinations as $destination)
            <div class="col-lg-4 col-sm-6">
                <div class="property-card card">
                    <div class="property-image"
                        style="background: url({{ $destination->show_image }}) center center / cover no-repeat;">
                    </div>

                    <div class="property-content card-body">
                        <div class="listingInfo">
                            <div class="">
                                <h5 class="text-overflow">
                                    <a href="{{route('destination.show', $destination->id)}}" class="text-dark">
                                        {{ $destination->name }}
                                    </a>
                                </h5>
                                <p class="text-muted text-overflow">
                                    <i class="mdi mdi-map-marker-radius mr-2"></i>{{ $destination->address }},
                                    {{ $destination->area }}, {{ $destination->state }}
                                </p>
                                <div class="d-flex" style="gap: 20px">
                                    <p class="text-muted text-overflow">{!! $destination->show_rating !!}
                                        ({{ $destination->ratings_count }})
                                    </p>
                                    <p class="text-muted text-overflow">
                                        <i class="mdi mdi-human-male-female-child mr-2"></i>{{ $destination->visit }}
                                        visits
                                    </p>
                                </div>
                                <div class="d-flex" style="gap: 20px">
                                    <p class="text-muted text-overflow">
                                        <i class="mdi mdi-phone mr-2"></i>{{ $destination->phone }}
                                    </p>
                                    <p class="text-muted text-overflow">
                                        <i class="mdi mdi-email mr-2"></i>{{ $destination->email }}
                                    </p>
                                </div>

                                <div class="">
                                    <p>{{ $destination->description_excerpt }}</p>
                                </div>

                                <div class="mt-3">
                                    <a href="{{route('destination.show', $destination->id)}}" class="btn btn-success btn-block waves-effect waves-light">
                                        View Detail
                                    </a>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('destination.edit', $destination->id)}}" style="width: 48%" class="btn btn-warning waves-effect waves-light">
                                            Edit
                                        </a>

                                        <form action="{{route('destination.delete', $destination->id)}}" onsubmit="return confirmDelete()" style="width: 48%" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="width: 100%" class="btn btn-danger">Delete</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end. Card actions -->
                    </div>
                    <!-- /inner row -->
                </div>
            </div>
        @empty
        <x-empty-table />
        @endforelse
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="justify-content-end">
        {{ $destinations->appends(['state' => request()->state, 'search' => request()->search,])->links() }}
    </div>
@endsection

@section('extra-scripts')
    <script src="/assets/libs/select2/select2.min.js"></script>
    <script src="/assets/js/pages/form-advanced.init.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
@endsection
