
@extends('layout')
@section('dashboard-title')
	@parent
		Dashboard
@endsection


@section('main-content')
@parent

    @section('header')
    @parent
        @section('nav')
        @parent
            @section('nav-header')
            @parent
                @section('nav-header-title')
                    DASHBOARD
                @endsection
                @section('nav-header-subtitle')
                    DASHBOARD
                @endsection
                @section('nav-header-action')
                @parent
                @endsection
            @endsection
        @endsection
    @endsection

    @section('content')
        @parent
        @include('dashboard.include.analytics')
    @endsection


@endsection
