@extends('layout.app')
@section('extra-css')
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">All Users</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <form class="row">
                <div class="col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="search" name="search" value="{{request()->search}}" class="selectpicker show-tick form-control"
                            data-style="btn-secondary" placeholder="Search..." />
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 mb-4 text-center">
                    <button type="submit" class="btn btn-block btn-purple waves-effect waves-light"><i
                            class="mdi mdi-magnify mr-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        @forelse ($users as $user)
            <div class="col-lg-4 col-sm-6">
                <div class="property-card card">
                    <div class="property-image"
                        style="background: url({{ $user->show_image }}) center center / cover no-repeat;">
                    </div>

                    <div class="property-content card-body">
                        <div class="listingInfo">
                            <div class="">
                                <h5 class="text-overflow">
                                    <a href="{{route('user.show', $user->id)}}" class="text-dark">
                                        {{ $user->name }}
                                    </a>
                                </h5>
                                <div class="d-flex" style="gap: 20px">
                                    <p class="text-muted text-overflow">
                                        <i class="mdi mdi-human-male-female-child mr-2"></i>{{ $user->visits_count }}
                                        visits
                                    </p>

                                    <p class="text-muted text-overflow">
                                        <i class="mdi mdi-email mr-2"></i>{{ $user->email }}
                                    </p>
                                </div>

                                <div class="">
                                    <p>{{ $user->description_excerpt }}</p>
                                </div>

                                <div class="mt-3">
                                    <a href="{{route('user.show', $user->id)}}" class="btn btn-success btn-block waves-effect waves-light">
                                        View Detail
                                    </a>
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
        {{ $users->appends(['state' => request()->state, 'search' => request()->search,])->links() }}
    </div>
@endsection

@section('extra-scripts')
    <script src="/assets/libs/select2/select2.min.js"></script>
    <script src="/assets/js/pages/form-advanced.init.js"></script>
@endsection
