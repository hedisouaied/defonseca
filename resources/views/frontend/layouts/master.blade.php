
<!doctype html>
<html lang="en">

<head>
    @include('frontend.layouts.head')

</head>

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <!-- Header Area -->
@include('frontend.layouts.header')
    <!-- Header Area End -->
@yield('content')

    <!-- Footer Area -->
@include('frontend.layouts.footer')
    <!-- Footer Area -->

@include('frontend.layouts.script')

</body>

</html>
