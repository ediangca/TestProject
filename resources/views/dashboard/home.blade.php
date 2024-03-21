@extends('dashboard.layout')
@section('dashboard-title')
	@parent
		Dashboard
@endsection


@section('content')
@parent
	@section('title-entity')
	<!-- <h2 class="text-center">DASHBOARD</h2> -->
	@endsection

	@section('board-content')
		<div class="row pr-3">
			<div class="col col-lg pis-census">
				<div class="bg-danger-subtle text-center p-2">
					<h2 class="fw-bold text-danger">20</h2>
					<p class="">EMERGENCY</p>
				</div>
			</div>
			<div class="col col-lg pis-census">
				<div class="bg-warning-subtle text-center p-2">
					<h2 class="fw-bold text-warning">50</h2>
					<p>OUTPATIENT</p>
				</div>
			</div>
			<div class="col col-lg pis-census">
				<div class="bg-success-subtle text-center p-2">
					<h2 class="fw-bold text-success">30</h2>
					<p>INPATIENT</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				
			</div>
		</div>
	@endsection

@endsection