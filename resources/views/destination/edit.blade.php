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
    <link href="/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Destination</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Edit - {{$destination->name}} data</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('destination.update', $destination->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required value="{{ old('name') ?? $destination->name }}" type="text" class="form-control"
                                    id="name" placeholder="Enter destination name" name="name">
                                <x-error-message record='name' />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">State</label>
                                <select required value="{{ old('state') }}" type="state" name="state"
                                    class="form-control select2" id="state">
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}" {{ (old('state') == $state || $destination->state == $state) ? 'selected' : '' }}>
                                            {{ $state }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-error-message record='state' />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input required value="{{ old('area') ?? $destination->area }}" type="text" class="form-control"
                                    id="area" placeholder="Enter destination area" name="area">
                                <x-error-message record='area' />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                    name="image">
                                <x-error-message record='image' />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input required value="{{ old('address')  ?? $destination->address }}" type="text" class="form-control"
                                    id="address" placeholder="Enter destination address" name="address">
                                <x-error-message record='address' />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input required value="{{ old('longitude')  ?? $destination->longitude }}" type="text" class="form-control"
                                    data-toggle="input-mask" data-mask-format="00.0000" id="longitude"
                                    placeholder="Enter destination longitude" name="longitude">
                                <x-error-message record='longitude' />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input required value="{{ old('latitude')  ?? $destination->latitude }}" type="text" class="form-control"
                                    data-toggle="input-mask" data-mask-format="00.0000" id="latitude"
                                    placeholder="Enter destination latitude" name="latitude">
                                <x-error-message record='latitude' />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" value="{{ old('phone')  ?? $destination->phone }}" name="phone" class="form-control"
                                    data-toggle="input-mask" data-mask-format="0000-000-0000">
                                <span class="font-13 text-muted">e.g "081-091-1991"</span>
                                <x-error-message record='phone' />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input required value="{{ old('email')  ?? $destination->email }}" type="email" name="email"
                                    class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <x-error-message record='email' />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <input value="{{ old('description')  ?? $destination->description }}" type="hidden" name="description" id="description">
                            <div id="snow-editor" style="height: 300px;">{!! old('description')  ?? $destination->description !!}</div>
                            <x-error-message record='description' />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/assets/libs/katex/katex.min.js"></script>
    <script src="/assets/libs/quill/quill.min.js"></script>
    <script src="/assets/libs/select2/select2.min.js"></script>

    <!-- Init js-->
    <script src="/assets/js/pages/form-advanced.init.js"></script>
    <script src="/assets/js/pages/form-quilljs.init.js"></script>
    <script src="/assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>

    <!-- Init js-->
    <script src="/assets/js/pages/form-masks.init.js"></script>

    <script>
        const snowEditor = document.getElementById('snow-editor');
        const descriptionInput = document.getElementById('description');

        snowEditor.addEventListener('keyup', () => {
            descriptionInput.value = snowEditor.children[0].innerHTML;
            console.log('snowEditor.getValue() :>> ', snowEditor.children[0].innerHTML);
        });
    </script>
@endsection
