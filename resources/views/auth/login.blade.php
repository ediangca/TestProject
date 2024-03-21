@extends('layout')
@section('title')
Login
@endsection


@section('content')
    @section('banner')
    @stop
<div class="container-fluid bg-cover bg-login">
    <div class="container">

        <div class="row justify-content-center pt-5">
            <div class="col col-sm col-md-8 col-lg-5 text-center">
                <div class="card overlay-transparent m-3 text-light">
                    <div class="card-header"> 
                        <h4 class="float-start">Sign In</h4>
                        <img class="img-fluid float-end" src="{{asset('img/sia-logo.png')}}" alt="IAS " width="100" height="100">
                    </div>
                        <div class="card-body">
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="mb-3 row justify-content-center">
                                    <div class="col-md ">
                                        <div class="input-group">
                                            <span class="input-group-text" id="username_label">Username</span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row justify-content-center">
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-text" id="username_label">Password</span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md text-end">
                                        <input type="submit" class="btn btn-primary" value="Sign In">
                                        <a type="submit" class="btn btn-secondary" value="Login" href="{{ route('register') }}">Sign Up</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>

    
@endsection