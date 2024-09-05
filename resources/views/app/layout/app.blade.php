<!doctype html>
<html lang="en">


@include('app.layout.head')

<body>

    @include('app.layout.header')


    @yield('body')

    @include('app.layout.scripts')
</body>

</html>
