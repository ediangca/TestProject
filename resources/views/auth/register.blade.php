@extends('layout')
@section('title')
Register
@endsection


@section('content')
<div class="container-fluid bg-cover bg-register">
    <div class="container">

        <div class="row">
            <div class="col-0 col-sm-0 col-md-5 col-lg-6">

            </div>
            <div class="col col-sm col-md col-lg ">
                <div class="card overlay-transparent m-3 text-light">
                    <div class="card-header">
                        <img class="img-fluid float-end" src="{{asset('img/logo-icon.png')}}" alt="IAS " width="100" height="100">
                        <h4 class="float-start">Sign Up</h4> 
                    </div>
                    <div class="card-body pt-4">
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text" id="username_label">
                                            <i class="bi bi-clipboard-data"></i>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your fullname">
                                        <div class="invalid-feedback">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-10 ">
                                    <div class="input-group">
                                        <span class="input-group-text" id="username_label">
                                            <i class="bi envelop">@</i>
                                        </span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address">
                                        <div class="invalid-feedback">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-10 ">
                                    <div class="input-group">
                                        <span class="input-group-text" id="username_label">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter a password">
                                        <div class="invalid-feedback">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-10 ">
                                    <div class="input-group">
                                        <span class="input-group-text" id="username_label">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                                        <div class="invalid-feedback">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-5 text-end" style="display: none;">
                                    <div class=" form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Is Admin</label>
                                    </div>
                                </div>
                                <div class="col-md-10 text-start form-group">
                                    <input class="form-check-input" type="checkbox"  id="usertype" name="usertype" value="admin" >
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Check this if Admin account.</label>
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                    <div class="col-md-10 text-end">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Sign Up">
                                    <a type="submit" class="btn btn-secondary" value="Login" href="{{ route('login') }}">Sign In</a>
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