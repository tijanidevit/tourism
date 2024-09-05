@extends('app.layout.app')

@section('body')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Desination Details</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ route('app.home') }}">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>{{ $destination->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-success-alert />
    <div class="package-details-wrapper pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="package-details">
                        <div class="package-thumb">
                            <img src="{{ $destination->show_image }}" alt="{{ $destination->show_name }}" />
                        </div>
                        <div class="package-header">
                            <div class="package-title">
                                <h3>{{ $destination->name }}</h3>
                                <strong><i class="mdi mdi-map-marker"></i>
                                    {{ $destination->address }}
                                </strong>
                            </div>
                            <div class="pd-review">
                                <ul>
                                    {!! $destination->show_rating !!}
                                </ul>
                                <p>{{ $destination->ratings_count }} Reviews</p>
                            </div>
                        </div>
                        <div class="p-short-info">
                            <div class="single-info">
                                {{-- <i class="mdi mdi-phone"></i> --}}
                                <div class="info-texts">
                                    <strong>Phone number</strong>
                                    <p>{{ $destination->phone }}</p>
                                </div>
                            </div>
                            <div class="single-info">
                                {{-- <i class="mdi mdi-email"></i> --}}
                                <div class="info-texts">
                                    <strong>Email</strong>
                                    <p>{{ $destination->email }}</p>
                                </div>
                            </div>
                            <div class="single-info">
                                {{-- <i class="mdi mdi-traveller"></i> --}}
                                <div class="info-texts">
                                    <strong>Visits</strong>
                                    <p>{{ $destination->visit }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="package-tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        <i class="mdi mdi-information"></i> Information
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        <i class="mdi mdi-comment-quote"></i> Reviews
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content p-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tab-content-1">
                                                <div class="p-overview">
                                                    <h5>Overview</h5>
                                                    <p>
                                                        {!! $destination->description !!}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="tab-content-1">
                                        <div class="p-rationg">
                                            <h5>Rating</h5>
                                            <div class="rating-card">
                                                <div class="r-card-avarag">
                                                    <h2>{{ $destination->rating }}</h2>
                                                    <p>{{ $destination->ratings_count }} users</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-review">
                                            <ul>
                                                @forelse ($destination->latestRatings as $rating)
                                                    <li class="p-review-card">
                                                        <div class="p-review-info">
                                                            <div class="p-reviewr-img">
                                                                <img src="{{ $rating->user->show_image }}"
                                                                    alt="{{ $rating->user->name }}" />
                                                            </div>
                                                            <div class="p-reviewer-info">
                                                                <strong>{{ $rating->user->name }}</strong>
                                                                <p>{{ $rating->created_at->format('d M, Y H:i') }}</p>
                                                                <ul class="review-star">
                                                                    {!! $rating->show_rating !!}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="p-review-texts">
                                                            <p>
                                                                {{ $rating->feedback }}
                                                            </p>
                                                        </div>
                                                        {{-- <button href="#" class="r-reply-btn"><i
                                                                class="bx bx-reply"></i> Review</button> --}}
                                                    </li>
                                                @empty
                                                    <p>No reviews yet. Be the first to review this destination</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="p-review-input">
                                            <form method="POST" action="{{route('app.destination.rate', $destination->id)}}">
                                                @csrf
                                                <h5>Leave Your Comment</h5>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="rating">Rating</label>
                                                        <select class="form-control" name="rating" id="">
                                                            <option @selected(old('rating') == 1) value="1">1</option>
                                                            <option @selected(old('rating') == 2) value="2">2</option>
                                                            <option @selected(old('rating') == 3) value="3">3</option>
                                                            <option @selected(old('rating') == 4) value="4">4</option>
                                                            <option @selected(old('rating') == 5) value="5">5</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label for="feedback">Feedback</label>
                                                        <textarea cols="30" name="feedback" rows="7" placeholder="Write Message">{{old('feedback')}}</textarea>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Submit Now" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-d-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="p-sidebar-form">
                                    <form method="POST" action="{{route('app.destination.book', $destination->id)}}">
                                        @csrf
                                        <h5 class="package-d-head">Book Visit</h5>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="">Date of visit</label>
                                                <div class="calendar-input">
                                                    <input type="text" required name="date_of_visit" class="input-field check-in"
                                                        placeholder="dd-mm-yy" />
                                                    <i class="flaticon-calendar"></i>
                                                </div>

                                                <x-error-message record='date_of_visit' />
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="submit" value="Book Now" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 col-md-6">
                                <div class="p-sidebar-cards mt-40">
                                    <h5 class="package-d-head">Popular Packages</h5>
                                    <ul class="package-cards">
                                        <li class="package-card-sm">
                                            <div class="p-sm-img">
                                                <img src="assets/images/package/p-sm-1.png" alt />
                                            </div>
                                            <div class="package-info">
                                                <div class="package-date-sm">
                                                    <strong><i class="flaticon-calendar"></i>5 Days/6
                                                        night</strong>
                                                </div>
                                                <h3>
                                                    <i class="flaticon-arrival"></i>
                                                    <a href="package-details.html">Lake Garda</a>
                                                </h3>
                                                <h5><span>$180</span>/ Per Person</h5>
                                            </div>
                                        </li>
                                        <li class="package-card-sm">
                                            <div class="p-sm-img">
                                                <img src="assets/images/package/p-sm-4.png" alt />
                                            </div>
                                            <div class="package-info">
                                                <div class="package-date-sm">
                                                    <strong><i class="flaticon-calendar"></i>5 Days/6
                                                        night</strong>
                                                </div>
                                                <h3>
                                                    <i class="flaticon-arrival"></i>
                                                    <a href="package-details.html">Paris Hill Tour</a>
                                                </h3>
                                                <h5><span>$180</span>/ Per Person</h5>
                                            </div>
                                        </li>
                                        <li class="package-card-sm">
                                            <div class="p-sm-img">
                                                <img src="assets/images/package/p-sm-2.png" alt />
                                            </div>
                                            <div class="package-info">
                                                <div class="package-date-sm">
                                                    <strong><i class="flaticon-calendar"></i>5 Days/6
                                                        night</strong>
                                                </div>
                                                <h3>
                                                    <i class="flaticon-arrival"></i>
                                                    <a href="package-details.html">Amalfi Costa</a>
                                                </h3>
                                                <h5><span>$180</span>/ Per Person</h5>
                                            </div>
                                        </li>
                                        <li class="package-card-sm">
                                            <div class="p-sm-img">
                                                <img src="assets/images/package/p-sm-3.png" alt />
                                            </div>
                                            <div class="package-info">
                                                <div class="package-date-sm">
                                                    <strong><i class="flaticon-calendar"></i>5 Days/6
                                                        night</strong>
                                                </div>
                                                <h3>
                                                    <i class="flaticon-arrival"></i>
                                                    <a href="package-details.html">Mount Dtna</a>
                                                </h3>
                                                <h5><span>$180</span>/ Per Person</h5>
                                            </div>
                                        </li>
                                        <li class="package-card-sm">
                                            <div class="p-sm-img">
                                                <img src="assets/images/package/p-sm-4.png" alt />
                                            </div>
                                            <div class="package-info">
                                                <div class="package-date-sm">
                                                    <strong><i class="flaticon-calendar"></i>5 Days/6
                                                        night</strong>
                                                </div>
                                                <h3>
                                                    <i class="flaticon-arrival"></i>
                                                    <a href="package-details.html">Fench Rivirany</a>
                                                </h3>
                                                <h5><span>$180</span>/ Per Person</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
