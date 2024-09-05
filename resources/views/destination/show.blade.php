@extends('layout.app')

@section('extra-css')
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Destination details</h4>
            </div>
        </div>
    </div>

    <div class="property-detail-wrapper" focus>
        <div class="row">
            <div class="col-lg-8">
                <div class="">
                    <img class="img-fluid" src="{{ $destination->show_image }}" alt="slide-image" />
                </div>
                <!-- end slider -->

                <div class="mt-4">
                    <h4>{{ $destination->name }}</h4>
                    <p class="text-muted text-overflow"><i
                            class="mdi mdi-map-marker-radius mr-2"></i>{{ $destination->address }},
                        {{ $destination->area }}, {{ $destination->state }}</p>
                    <div class="d-flex" style="gap: 20px">
                        <p class="text-muted text-overflow"><i class="mdi mdi-phone mr-2"></i>{{ $destination->phone }}</p>
                        <p class="text-muted text-overflow"><i class="mdi mdi-email mr-2"></i>{{ $destination->email }}</p>
                        <p class="text-muted text-overflow">{!! $destination->show_rating !!} ({{ $destination->ratings_count }})</p>
                        <p class="text-muted text-overflow"><i
                                class="mdi mdi-human-male-female-child mr-2"></i>{{ $destination->visit }} visits</p>
                    </div>

                    <p class="mt-3">
                        {!! $destination->description !!}
                    </p>

                    <h4 class="mt-4 mb-3">Location</h4>

                    <div class="card-box">
                        <div id="map" style="height: 400px; width: 100%; background-color:beige"></div>
                    </div>

                </div>
                <!-- end m-t-30 -->

            </div>
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="text-left">
                        <h4 class="header-title mb-4">Recent Visits</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                @forelse ($destination->visits as $visit)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{route('user.show', $visit->user?->id)}}">{{$visit->user?->name}}</a>
                                        </th>
                                        <td>{{$visit->date_of_visit->format('d M, Y')}}</td>
                                    </tr>
                                @empty
                                    <x-empty-table />
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-4">{{$destination->visits->links()}}</div>
                    </div>
                </div>
                <!-- end card-box -->

            </div>
        </div>
        <!-- end row -->
    </div>
@endsection

@section('extra-scripts')
    <script>
        initMap()

        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: {{ $destination->latitude }},
                    lng: {{ $destination->longitude }}
                },
                zoom: 8
            });

            const marker = new google.maps.marker.AdvancedMarkerElement({
                map: map,
                position: {
                    lat: {{ $destination->latitude }},
                    lng: {{ $destination->longitude }}
                },
                title: "M",
                content: document.createElement(
                    'div'),
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=marker&callback=initMap"
        async defer></script>
@endsection
