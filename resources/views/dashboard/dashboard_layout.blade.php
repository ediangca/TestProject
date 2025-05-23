<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    @include('dashboard.include.head')


</head>

<body class="  ">
    <!-- loader Start -->
    {{-- @include('loader') --}}
    <!-- loader End -->

    <!-- Side Navbar Start -->
    @include('dashboard.include.sidenav')
    <!-- Side Navbar End -->

    <!-- Main Section Start -->
    @include('dashboard.include.body')
    <!-- Main Section End -->

    <!-- Settings Start -->
    @include('dashboard.include.settings')
    <!-- Settings End -->

<!-- Library Bundle Script -->
<script src="{{ asset('hopeui/js/core/libs.min.js') }}"></script>

<!-- External Library Bundle Script -->
<script src="{{ asset('hopeui/js/core/external.min.js') }}"></script>

<!-- Widgetchart Script -->
<script src="{{ asset('hopeui/js/charts/widgetcharts.js') }}"></script>

<!-- mapchart Script -->
<script src="{{ asset('hopeui/js/charts/vectore-chart.js') }}"></script>
<script src="{{ asset('hopeui/js/charts/dashboard.js') }}"></script>

<!-- fslightbox Script -->
<script src="{{ asset('hopeui/js/plugins/fslightbox.js') }}"></script>

<!-- Settings Script -->
<script src="{{ asset('hopeui/js/plugins/setting.js') }}"></script>

<!-- Slider-tab Script -->
<script src="{{ asset('hopeui/js/plugins/slider-tabs.js') }}"></script>

<!-- Form Wizard Script -->
<script src="{{ asset('hopeui/js/plugins/form-wizard.js') }}"></script>

<!-- AOS Animation Plugin-->
<script src="{{ asset('hopeui/vendor/aos/dist/aos.js') }}"></script>

<!-- App Script -->
<script src="{{ asset('hopeui/js/hope-ui.js') }}" defer></script>
</body>

</html>
