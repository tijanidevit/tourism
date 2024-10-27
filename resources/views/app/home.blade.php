@extends('app.layout.app')

@section('body')
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

    <div class="find-form mt-4">
        <div class="container">
            <form class="findfrom-wrapper" action="{{ route('app.home') }}">
                <div class="row">
                    <div class="col-lg-3">
                        <input type="search" name="search" class="px-2" value="{{ request()->search }}"
                            placeholder="Seach a tourism center">
                    </div>
                    <div class="col-lg-3">
                        <div class="custom-select">
                            <select name="state">
                                <option selected disabled value="">Select state</option>
                                <option value="">All</option>
                                @forelse ($states as $state)
                                    <option value="{{ $state }}" @selected($state == request()->state)>{{ $state }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="find-btn">
                            <button class="btn btn-success"><i class="bx bx-search-alt"></i> Find now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="package-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-head pb-45">
                        <h2>Latest Destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($destinations as $destination)
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-duration="1500ms"
                        data-wow-delay="0ms">
                        <div class="package-card">
                            <div class="package-thumb">
                                <img src="{{$destination->show_image}}" alt="{{$destination->name}}" class="img-fluid">
                            </div>
                            <div class="package-details">
                                <div class="package-info" style="margin-bottom: 2px !important">
                                    <h5>{{$destination->visit}} visits</h5>
                                    <h5>{{$destination->address}}, {{$destination->area}}, {{$destination->state}}</h5>
                                </div>
                                <h3 style="margin: -3px 0px">
                                    <i class="mdi mdi-home-city-outline"></i>
                                    <a href="{{route('app.destination.show',$destination->id)}}">{{$destination->name}}</a>
                                </h3>
                                <div>
                                    <p class="font-size: 10px !important">{{$destination->description_excerpt}}</p>
                                </div>
                                <div class="package-rating d-flex justify-content-between">
                                    <strong>{!! $destination->show_rating !!}<span> ({{$destination->ratings_count}})</span></strong>
                                    <strong>{{$destination->phone}}</strong>
                                    <strong>{{$destination->email}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                <div class="alert alert-info">
                    <p>No destination added recently</p>
                </div>
                @endforelse
            </div>

            {{$destinations->appends(['state' => request()->state, 'search' => request()->search])->links()}}
        </div>
    </div>
@endsection
