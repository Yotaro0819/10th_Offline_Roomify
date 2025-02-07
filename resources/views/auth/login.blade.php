@extends('layouts.app')

<style>
    html,body
    {
        overflow: hidden;
    }

    .card
    {
        margin-top: 50px;
    }

    .card .card-header
    {
        color: #004aad;
    }

    .btn
    {
        border-color:#dcbf7d;
        color: #dcbf7d;
        background-color: transparent;
        align-content: left;
        font-weight: bold;
    }

    .btn:hover
    {
        border-color:#dcbf7d !important;
        color: #ffffff !important;
        background-color: #dcbf7d !important;
    }
    .input-group .input-icon
    {
        color: #004aad;
        font-size: 30px;
    }

    .input-group input
    {
        border: 1px solid #004aad;
    }
    .form-control
    {
        border-radius: 15px;
        background-color: #ffffff;
        align-content: center;
        padding-left: 2.5rem;
    }
    ::placeholder
    {
        color: #A5A5A5;
        font-weight: bold;
    }

    p
    {
        font-size: 18px;
        font-weight: lighter;
        color: #004aad;
    }

    a
    {
        font-style: italic;
        color:#004aad !important;
    }
</style>

@section('content')
<div class="container">
    <div class="corner-circle circle-left-1"></div>
    <div class="corner-circle circle-left-2"></div>
    <div class="corner-circle circle-right-1"></div>
    <div class="corner-circle circle-right-2"></div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0 mx-auto w-50">
                <div class="card-header border-0">{{ __('Login') }}</div>
                <p>Please enter your Email and your Password</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(request()->has('redirect'))
                        <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-radius: 15px; color: black" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            </div>

                            @error('email')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>



                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <i class="fa-solid fa-lock input-icon"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="border-radius: 15px; color: black" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 mx-auto w-100">
                                <button type="submit" class="btn w-100 fw-bold" style="color:#dcbf7d; border-color: #dcbf7d">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <p class="fw-light mt-1">Not a member yet? <a href="{{ route('register') }}">Resister!</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
