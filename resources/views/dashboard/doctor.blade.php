@extends('dashboard.layout')
@section('dashboard-title')
	@parent
		Doctor
@endsection



@section('content')
@parent
	@section('title-entity')
		<h2 class="text-dark">Doctor Directory</h2>
	@endsection

@endsection