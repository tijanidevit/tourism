@extends('layout.app')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Real Estate Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card-box tilebox-two border-success">
                <i class="mdi mdi-account float-right"></i>
                <h6 class="text-success text-uppercase mb-3 mt-2">Total Users</h6>
                <h2 class="mb-2"><span data-plugin="counterup">{{ $users_count }}</span></h2>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="card-box tilebox-two border-primary">
                <i class="mdi mdi-map-marker-multiple float-right"></i>
                <h6 class="text-primary text-uppercase mb-3 mt-2">Total Destinations</h6>
                <h2 class="mb-2"><span data-plugin="counterup">{{ $destinations_count }}</span></h2>
            </div>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Recent Users</h4>

                <table class="table table-centered mb-0">
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <a class="user" href="#">
                                        <img src="{{ $user->show_image }}" alt="{{ $user->name }}"
                                            class="rounded-circle img-thumbnail avatar-md">
                                    </a>
                                </td>
                                <td>
                                    <h5 class="mt-0 mb-1 font-15">{{ $user->name }} </h5>
                                    <p class="font-13 mb-0"> {{ $user->visits_count }} total visits</p>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('user.show', $user->id) }}"
                                        class="btn btn-sm btn-bordered-primary waves-effect waves-light btn-primary"><i
                                            class="mdi mdi-eye"></i> View</a>
                                </td>
                            </tr>
                        @empty
                            <x-empty-table colspan="1" />
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Recently Added Destinations</h4>

                @forelse ($destinations as $destination)
                    <div class="media latest-post-item mt-3">
                        <div class="media-left mr-2">
                            <a href="{{route('destination.show', $destination->id)}}">
                                <img class="rounded" alt="{{$destination->name}}" src="{{$destination->show_image}}" style="width: 100px; height: 66px;"> </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading mt-0 font-16">
                                <a href="{{route('destination.show', $destination->id)}}" class="text-muted">{{$destination->name}}</a>
                            </h5>
                            <p class="font-13 text-muted">
                                {{$destination->visit}} visits | {!! $destination->show_rating !!}
                            </p>
                        </div>
                    </div>
                @empty
                    <x-empty-table colspan="1" />
                @endforelse

            </div>
            <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>
@endsection
