@extends('layout')
@section('title')
    @parent
    @yield('dashboard-title')
@endsection

    @section('custom-css')
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/core/libs.min.css') }}">
    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/vendor/aos/dist/aos.css') }}">
    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/hope-ui.min.css?v=4.0.0') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/custom.min.css?v=4.0.0') }}">
    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/dark.min.css') }}">
    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/customizer.min.css') }}">
    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('hopeui/css/rtl.min.css') }}">
    @show


@section('body')
    <!-- Side Navbar Start -->
    @include('dashboard.include.sidenav')
    <!-- Side Navbar End -->
    <!-- Main Section Start -->
    @include('dashboard.include.body')
    <!-- Main Section End -->
    <!-- Settings Start -->
    @include('dashboard.include.settings')
    <!-- Settings End -->
@endsection

@section('custom-script')

    <!-- Library Bundle Script -->
    <script src="{{ asset('hopeui/js/core/libs.min.js') }}"></script>
    <!-- External Library Bundle Script -->
    <script src="{{ asset('hopeui/js/core/external.min.js') }}"></script>
    <!-- Widgetchart Script -->
    <script src="{{ asset('hopeui/js/charts/widgetcharts.js') }}"></script>
    <!-- mapchart Script -->
    <script src="{{ asset('hopeui/js/charts/vectore-chart.js') }}"></script>
    <script src=".{{ asset('hopeui/js/charts/dashboard.js') }}"></script>
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
@show
