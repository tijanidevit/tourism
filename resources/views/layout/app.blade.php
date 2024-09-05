<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('layout.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->

        @include('layout.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('body')

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->

            @include('layout.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- /Right-bar -->

    <!-- Vendor js -->
    @include('layout.scripts')


</body>

</html>
