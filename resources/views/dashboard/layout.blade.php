@extends('layout')
@section('title')
	@parent
		@yield('dashboard-title')
@endsection

@section('header')
<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Do you really want to Logout?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>
    </div>
</div>

	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-expand-lg">  <!-- bg-body-tertiary -->
                <div class="container-fluid">
                	<a class="navbar-brand" href="/"><img class="img-fluid" src="{{asset('img/logo.png')}}" alt="IAS " width="100" height="50"></a>
                        
                        <h1 class="text-left text-primary pis-title" id="pis-title">Davao del Norte Hospital</h1>
                        <!-- 
                       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                         -->

                        <div class="float-right nav ms-auto">
                            @guest
                                    <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                                    <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                            @else    
                                    <a class="nav-link" href="{{ route('dashboard_home') }}">{{ Auth::user()->name }}</a>
                                    <button value="logout" class="btn btn-outline-secondary fs-5 px-3 logout" id="dropdown-item logout" data-bs-toggle="modal" data-bs-target="#logoutmodal"
                                    ><i class="bi bi-power" data-bs-toggle="tooltip"  data-bs-placement="bottom" data-bs-title="LOGOUT"></i></button>
                            @endguest
                        </div>
                    <!-- <form class="d-flex" role="search">
                    	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    	<button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </nav>
		</div>
	</div>
@endsection

@section('content')
	<div class="container-fluid pis-dashboard">
		<div class="row">
			<div class="col-5 col-md-3 offcanvas offcanvas-start bg-light" data-cs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
				<div class="offcanvas-header text-success">
	                <a class="navbar-brand" href="/"><img class="img-fluid" src="{{asset('img/logo.png')}}" alt="IAS " width="100" height="50"></a>
	                
					<a class="btn-close text-reset text-white" type="button" data-bs-dismiss="offcanvas" area-label="Close">
	                <span class="navbar-toggler-icon text-white"></span>
	                </a>
				</div>
				<div class="offcanvass-body side-nav p-0">
						
							<div class="accordion" id="accordionPanelsStayOpenExample">
								<div class="accordion-item bg-dark-subtle ms-auto">
								    <a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}"><i class="bi bi-window-sidebar">
								    &nbsp;DASHBOARD</i></a>
								    <a class="btn fw-bold text-start w-100" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"><i class="bi bi-folder">
								    &nbsp;DIRECTORY</i><i class="bi bi-plus float-end"></i></a>
									    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse bg-light show">
									      <div class="accordion-body p-0 px-3">
										    	<a class="btn fw-bold text-start w-100" href="{{ route('directory_patient') }}">
										        <i class="bi bi-people">&nbsp;
										        PATIENTS</i></a>
										    	<a class="btn fw-bold text-start w-100" href="{{ route('directory_item_services') }}">
										        <i class="bi bi-prescription2">&nbsp; 
										        ITEMS AND SERVICES</i></a>
										    	<a class="btn fw-bold text-start w-100" href="{{ route('directory_doctor') }}">
										        <i class="bi bi-clipboard-data">&nbsp; 
										        DOCTORS</i></a>
										      	<a class="btn fw-bold text-start w-100" href="{{ route('directory_guarrantor') }}">
										        <i class="bi bi-clipboard-data"/>&nbsp; 
										        GUARRANTORS</i></a>
									      </div>
									    </div>
									<a class="btn fw-bold text-start w-100" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> 
								    <i class="bi bi-repeat">&nbsp;TRANSACTION</i><i class="bi bi-plus float-end"></i></a>
									    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse bg-light show">
									      	<div class="accordion-body p-0 px-3">
										      	<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-person-up">&nbsp; 
										        OUTPATIENT</i></a>
									      		<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-person-plus">&nbsp; 
										        EMERGENCY</i></a>
										      	<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-person-down">&nbsp; 
										        INPATIENT</i>
										      	</a>
										      	<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-clipboard-plus">&nbsp; 
										        STATIONS</i></a>
									      	</div>
									    </div>
									<a class="btn fw-bold text-start w-100" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> 
								    <i class="bi bi-gear">&nbsp;SETTINGS</i><i class="bi bi-plus float-end"></i></a>
									    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse bg-light show">
									      	<div class="accordion-body p-0 px-3">
									      		<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-columns-gap"></i>&nbsp; 
										        DEPARTMENTS
										      	</a>
									      		<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-list-ol"></i>&nbsp; 
										        ICD-CODE
										      	</a>
									      		<a class="btn fw-bold text-start w-100" href="{{ route('dashboard_home') }}">
										        <i class="bi bi-person-gear"></i>&nbsp; 
										        USER ACCOUNT
										      	</a>
									      	</div>
									    </div>
								</div>
  							</div>
                            
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-2 col-sm-2 col-md-1 col-lg-1 side-nav-col pt-3 pb-3 ">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light text-center">
							<li class="nav-item">
								<a class="btn btn-outline-primary w-100 fs-3 p-0" type="button" data-bs-toggle="offcanvas"data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
			                        <i class="bi bi-justify" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="MENU"></i>
			                	</a>
			                </li>
			                <hr class="text-dark m-1">
							<li class="nav-item">
								<a class="btn btn-outline-primary w-100 fs-3 p-0" type="button" id="btn-dashboard" href="{{ route('dashboard_home') }}"
								data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="DASHBOARD"><i class="bi bi-window-sidebar"></i>
			                	</a>
			                </li>
			                <hr class="text-dark m-1">
							<li class="nav-item">
								<a class="btn btn-outline-primary w-100 fs-3 p-0" type="button" id="btn-dashboard" href="{{ route('dashboard_home') }}"
								data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="OUTPATIENTS"><i class="bi bi-person-fill-up"></i>
			                	</a>
			                </li>
			                <hr class="text-dark m-1">
							<li class="nav-item">
								<a class="btn btn-outline-primary w-100 fs-3 p-0" type="button" id="btn-dashboard" href="{{ route('dashboard_home') }}"
								data-bs-toggle="tooltip"  data-bs-placement="right" data-bs-title="EMERGENCIES"><i class="bi bi-person-fill-add"></i>
				                </a>
				            </li>
			                <hr class="text-dark m-1">
							<li class="nav-item">
								<a class="btn btn-outline-primary w-100 fs-3 p-0" type="button" id="btn-dashboard" href="{{ route('dashboard_home') }}"
								data-bs-toggle="tooltip"  data-bs-placement="right" data-bs-title="INPATIENTS"><i class="bi bi-person-fill-down"></i>
			                	</a>
			                </li>
		            	</ul>
					</div>
					<div class="col text-light">
						@yield('title-entity')
						@yield('board-content')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
