@extends('app')
@section('title')
Register
@endsection


@section('content')

<div class="container-fluid">
    <div class="container">
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card m-3">
                    <div class="card-header">Hi, {{ Auth::user()->name }}!</div>
                    <div class="card-body">
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @else
                            <div class="alert alert-success">
                                You are logged in!
                            </div>       
                        @endif            
                    </div>
                </div>
            </div>    
        </div>
    </div>    
</div>

@endsection