<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kamr Hotel Admin Dashboard" />
    <meta property="og:title" content="Kamr Hotel Admin Dashboard" />
    <meta property="og:description" content="Kamr Hotel Admin Dashboard" />
    <meta property="og:image" content="https://kamr.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Tourism</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png" />
    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#">
                                            <img src="/app/assets/images/logo.png" alt="">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('register.post') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Name</strong></label>
                                            <input type="text" required name="name" class="form-control"
                                                value="{{ old('name') }}">
                                            <x-error-message record='name' />
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" required name="email" class="form-control"
                                                value="{{ old('email') }}">
                                            <x-error-message record='email' />
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" required name="password" class="form-control">
                                            <x-error-message record='password' />
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                        </div>

                                        <div class="mt-4">
                                            <p>Don't have an account? <a href="{{route('register')}}">Register here</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
</body>

</html>
