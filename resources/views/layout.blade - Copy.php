<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    @include('head_')

</head>

<body class="" style="overflow:hidden;">
    <div class="container-fluid p-0 vh-100 side-nav">
        @section('header')

            <!-- Modal -->
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
                                        document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-0">
                <div class="container">
                    <nav class="navbar navbar-expand-lg bg-white"> <!-- bg-body-tertiary -->
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{ URL('/') }}"><img class="img-fluid"
                                    src="{{ asset('img/logo-icon.png') }}" alt="IAS "></a>
                            {{-- <h1>HIS</h1> --}}
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ URL('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('/aboutus') }} ">About HIS</a>
                                    </li>
                                    <li class="nav-item nav-dropdown">
                                        <a class="nav-link" href="{{ URL('/') }}">Services</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('/') }}">Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('/') }}">Contact Us</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                                            </li> -->
                                </ul>
                                <ul class="navbar-nav ms-auto">
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                                href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                                href="{{ route('register') }}">Register</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">

                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard_home') }}">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a value="logout" class="dropdown-item logout" id="dropdown-item logout"
                                                        data-bs-toggle="modal" data-bs-target="#logoutmodal">Logout</a>
                                                </li>
                                            </ul>

                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        @show


        @section('content')
        @section('banner')
            <div class="container-fluid text-center p-0">
                <!-- <a class="navbar-brand" href="/"><img src="{{ asset('img/IAS.png') }}" alt="IAS "></a> -->

                <div id="carouselExampleFade" class="carousel slide h-100">
                    <!--  carousel-fade add this to make it fade instead -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/banner3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        @show
    @show

    @section('footer')
        <div class="container-fluid bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-center mb-0">Powered by {{ config('app.name', 'HIS') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @show

</div>
<div class="loader"></div>


<script type="text/javascript">
    //Tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    //Other way for Tooltip
    /*document.querySelectorAll('[data-bs-toggle="tooltip"]')
    .forEach(tooltip => {
      new bootstrap.Tooltip(tooltip)
    })*/
</script>



@yield('script')


</body>

</html>
