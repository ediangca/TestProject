@extends('layout')

@section('title')
@parent
Home
@endsection


@section('content')
@parent
	<!-- Defination Section -->
	<div class="container-fluid bg-light">
	    <div id="aboutus" class = "container pt-5 pb-5">
	        <div class="row text-center">
	            <h2 class="text-uppercase">HIS</h2>
	            <h5>Hospital Information System</h5>
	            <p>The course covers fundamental concepts of system integration and system architecture. <br>
	            It specifically focuses on the various management strategies of system architecture as well as their integration into the organization. </p>
	            <p style="text-align: justify;">The course is focused on concepts in enterprise architecture and application integration. 
	                It describes data, application, and technology needed to create business solutions for organizations. 
	                Principles and major frameworks in EA (Enterprise Architecture) will be introduced as well as the techniques and strategies in designing and planning and managing enterprise architecture.</p>
	        </div>
	        <div class="row">
	            <div class="col">
	                <h3> The topics include managing the : </h3>
	                <ul>
	                    <li>Information systems architecture</li>
	                    <li>Ensuring a reliable</li>
	                    <li>Secure architecture </li>
	                    <li>Integration techniques.</li>
	                </ul>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col">
	                <p style="text-align: justify;"><span class="fw-bold">IT integration, or systems integration</span>, is the connection of data, applications, APIs, and devices across your IT organization to be more efficient, productive, and agile. ...
	                Integration not only connects, but it also adds value through the new functionalities provided by connecting different systems' functions.</p>
	                <p>
	                <h3>System Architecture</h3>
	                <ul>
	                    <li>is the conceptual model that defines the structure, behavior, and more views of a system.</li>
	                    <li>can consist of system components and the sub-systems developed, that will work together to implement the overall system.</li>
	                </ul>
	            </div>
	            
	            
	        </div>
	    </div>
	</div>

	<!-- Approach Section -->
	<div class="container-fluid bg-dark text-white">
	    <div class = "container pt-5 pb-5">
	        <div class="row">
	            <div class="col text-center">
	                <h2 class="text-uppercase">System Integration Approach</h2>
	                <p class="text-center">System integration is multifaceted and can be approached through different architectural models, depending on the number and nature of components that need to be connected.</p>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md mt-5">
	                <div class="card">
	                    <img src="{{asset('img/p2p.png')}}" class="card-img-top" alt="...">
	                    <div class="card-body">
	                        <h5 class="card-title">Point-to-point model</h5>
	                        <p class="card-text"style="text-align: justify; height: 10rem;">Point-to-point integration (P2P) is the architectural pattern in which every system is directly connected to all other systems and apps it needs to work in tandem and share information with. This model can be realized via APIs, webhooks, or custom code.</p>
	                        <div class="text-center">
	                            <a href="#" class="btn btn-primary">Read More</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md mt-5">
	                <div class="card">
	                    <img src="{{asset('img/hub-and-spoke.png')}}" class="card-img-top" alt="...">
	                    <div class="card-body">
	                        <h5 class="card-title">Hub-and-spoke model</h5>
	                        <p class="card-text"style="text-align: justify; height: 10rem;">The hub-and-spoke model is a more advanced type of integration architecture that addresses the issues of point-to-point and helps to avoid the star/spaghetti mess. </p>
	                        <div class="text-center">
	                            <a href="#" class="btn btn-primary">Read More</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md mt-5">
	                <div class="card">
	                    <img src="{{asset('img/p2p.png')}}" class="card-img-top" alt="...">
	                    <div class="card-body">
	                        <h5 class="card-title">Enterprise Service Bus (ESB) model</h5>
	                        <p class="card-text"style="text-align: justify; height: 10rem;">The ESB architecture involves the creation of a separate specialized subsystem — an enterprise service bus — that serves as a common user interface layer connecting other subsystems.</p>
	                        <div class="text-center">
	                            <a href="#" class="btn btn-primary">Read More</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@endsection