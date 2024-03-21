@extends('dashboard.layout')
@section('dashboard-title')
	@parent
		Patient
@endsection



@section('content')
@parent
	@section('title-entity')
		<h2 class="text-dark">Patient Directory</h2>
	@endsection

@endsection