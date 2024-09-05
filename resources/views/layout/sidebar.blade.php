<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('home')}}" class="waves-effect waves-light">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect waves-light">
                        <i class="mdi mdi-home-map-marker"></i>
                        <span> Destinations </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('destination.index')}}">All destinations</a></li>
                        <li><a href="{{route('destination.create')}}">New destination</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect waves-light">
                        <i class="mdi mdi-account-multiple"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('user.index')}}">All users</a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

    </div>
    <!-- Sidebar -left -->

</div>
