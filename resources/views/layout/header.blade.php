<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="d-none d-sm-inline-block ml-1">{{auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <form method="POST" class="dropdown-item notify-item" action="{{route('logout')}}">
                    @csrf
                    <button class="btn btn-secondary"><i class="mdi mdi-logout-variant"></i> Logout</button>
                </form>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="/" class="logo text-center">
            <span class="logo-lg">
                <img src="/app/assets/images/logo.png" alt="" height="18">
                <!-- <span class="logo-lg-text-light">Zircos</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">Z</span> -->
                <img src="/assets/images/logo-sm.png" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
