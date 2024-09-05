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

    <div class="find-form">
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
                        <h2>Latest Destination Visits</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($visits as $visit)
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-duration="1500ms"
                        data-wow-delay="0ms">
                        <div class="package-card">
                            <div class="package-thumb">
                                <img src="{{$visit->destination->show_image}}" alt="{{$visit->destination->name}}" class="img-fluid">
                            </div>
                            <div class="package-details">
                                <div class="package-info" style="margin-bottom: 2px !important">
                                    <h5>Visited on: {{$visit->date_of_visit->format('d M, Y')}}</h5>
                                    <h5>{{$visit->destination->address}}, {{$visit->destination->area}}, {{$visit->destination->state}}</h5>
                                </div>
                                <h3 style="margin: -3px 0px">
                                    <i class="mdi mdi-home-city-outline"></i>
                                    <a href="{{route('app.destination.show',$visit->destination->id)}}">{{$visit->destination->name}}</a>
                                </h3>
                                <div>
                                    <p class="font-size: 10px !important">{{$visit->destination->description_excerpt}}</p>
                                </div>
                                <div class="package-rating d-flex justify-content-between">
                                    <strong>{!! $visit->destination->show_rating !!}<span> ({{$visit->destination->ratings_count}})</span></strong>
                                    <strong>{{$visit->destination->phone}}</strong>
                                    <strong>{{$visit->destination->email}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                <div class="alert alert-info">
                    <p>No visit added recently</p>
                </div>
                @endforelse
            </div>

            {{$visits->appends(['state' => request()->state, 'search' => request()->search])->links()}}
        </div>
    </div>
@endsection
