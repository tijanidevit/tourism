<header>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="navbar-wrap">
                        <div class="logo d-flex justify-content-between">
                            <a href="{{route('app.home')}}" class="navbar-brand"> <img src="/app/assets/images/logo.png" alt></a>
                        </div>
                        <div class="navbar-icons">
                            <div class="user-dropdown-icon">
                                <i class="mdi mdi-account"></i>
                                <div class="account-dropdown">
                                    <ul>
                                        @auth
                                            <li class="account-el">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <i class="bx bx-log-in-circle"></i>
                                                    <button class="btn text-danger">Log out</button>
                                                </form>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                            <div class="mobile-menu d-flex ">
                                <div class="top-search-bar m-0 d-block d-xl-none">
                                </div>
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <nav class="main-nav">
                        <div class="navber-logo-sm">
                            <img src="/app/assets/images/logo-2.png" alt class="img-fluid">
                        </div>
                        <ul>
                            <li><a href="{{route('app.bookings')}}">Bookings </a></li>
                            <li><a href="{{route('app.profile.index')}}">Profile </a></li>
                            {{-- <li><a href="{{route('app.map')}}">Map </a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
