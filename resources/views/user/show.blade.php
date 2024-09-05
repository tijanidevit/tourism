@extends('layout.app')

@section('extra-css')
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">User details</h4>
            </div>
        </div>
    </div>

    <div class="property-detail-wrapper" focus>
        <div class="row">
            <div class="col-lg-8">
                <div class="">
                    <img class="img-fluid" src="{{ $user->show_image }}" alt="slide-image" />
                </div>
                <!-- end slider -->

                <div class="mt-4">
                    <h4>{{ $user->name }}</h4>
                    <div class="d-flex" style="gap: 20px">
                        <p class="text-muted text-overflow"><i class="mdi mdi-email mr-2"></i>{{ $user->email }}</p>
                        <p class="text-muted text-overflow">
                            <i class="mdi mdi-human-male-female-child mr-2"></i>{{ $user->visits_count }} visits
                        </p>
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
                                @forelse ($user->visits as $visit)
                                    <tr>
                                        <th scope="row">
                                            <a
                                                href="{{ route('destination.show', $visit->destination?->id) }}">{{ $visit->destination?->name }}</a>
                                        </th>
                                        <td>{{ $visit->date_of_visit->format('d M, Y') }}</td>
                                    </tr>
                                @empty
                                    <x-empty-table />
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-4">{{ $user->visits->links() }}</div>
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
                    lat: {{ $user->latitude }},
                    lng: {{ $user->longitude }}
                },
                zoom: 8
            });

            const marker = new google.maps.marker.AdvancedMarkerElement({
                map: map,
                position: {
                    lat: {{ $user->latitude }},
                    lng: {{ $user->longitude }}
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
