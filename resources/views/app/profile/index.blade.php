@extends('app.layout.app')

@section('body')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>My Profile</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ route('app.home') }}">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-success-alert />
    <div class="package-details-wrapper pt-3">
        <div class="container">
            <h4 class="text-center">Update Profile Image</h4>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('app.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" value="{{auth()->user()->name}}" readonly disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input class="form-control" value="{{auth()->user()->email}}" readonly disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Profile Image</label>
                            <input class="form-control" name="image" required type="file" accept="image/*">
                            <x-error-message record='image' />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


                <div class="col-lg-6">
                    <div class="img-fluid">
                        <img style="width:100%" src="{{ auth()->user()->show_image }}"
                            alt="{{ auth()->user()->show_name }}" />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
