@extends('layouts.app')

<style>
    html,body{
        overflow: hidden;
    }
    .card{
        margin-top: 50px;
    }
    .card .card-header{
        color: #004aad;
    }
    .btn{
        border-color:#dcbf7d;
        color: #dcbf7d;
        background-color: transparent;
        align-content: left;
        font-weight: bold;
    }
    .btn:hover{
        border-color:#dcbf7d !important;
        color: #ffffff !important;
        background-color: #dcbf7d !important;
    }
    .input-group .input-group-text{
        border: 1px solid #004aad;
        border-right: 0;
        border-radius: 15px 0 0 15px;
        width: 50px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .input-group input{
        border: 1px solid #004aad;
        outline: none;
        border-left: 0;
        border-radius: 15px;
    }
    .input-icon{
        color:#004aad;
        font-size: 28px;
        position: relative;
        margin-left: -10px;
    }
    .input-group .form-control.is-invalid {
        border-color: #dc3545 !important;
        border-radius: 0 15px 15px 0 !important;
    }

    .input-group .input-group-text.has-error {
        border-color: #dc3545 !important;
    }
    .input-group .input-group-text.has-error .input-icon {
        color: #dc3545 !important;
    }

    .form-control{
    color: #000000 !important;
    background-color: #ffffff !important;
    }
    .form-control:focus{
        color: #000000 !important;
        background-color: #ffffff !important;
        box-shadow: none !important;
        border-color: #004aad !important;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
        -webkit-text-fill-color: #000000 !important;
        transition: background-color 5000s ease-in-out 0s;
    }
    p{
        font-size: 18px;
        font-weight: lighter;
        color: #004aad;
    }

    ::placeholder{
        color: #A5A5A5;
        font-weight: bold;
    }

    a{
        font-style: italic;
        color:#004aad !important;
    }
    .corner-circle {
        width: 100px;
        height: 100px;
        background-color: #dcbf7d;
        border-radius: 50%;
        position: absolute;
    }
    /* left top */
    .circle-left-1{
        width: 650px;
        height: 650px;
        top: 0;
        left: 0;
        transform: translate(-50%, -50%);
    }
    /* left bottom */
    .circle-left-2 {
        width: 400px;
        height: 400px;
        bottom: 100px;
        left: 0;
        transform: translate(-50%, 80%);
    }
    /* right bottom top */
    .circle-right-1{
        width: 500px;
        height: 800px;
        bottom: 300px;
        right: 50px;
        transform: translate(70%, 65%);
    }
    /* right bottom bottom */
    .circle-right-2{
        width: 900px;
        height: 500px;
        bottom: 0px;
        right: 0px;
        transform: translate(50%, 50%);
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
                                <div class="input-group-text">
                                    <i class="fa-regular fa-envelope input-icon"></i>
                                </div>
                                <input id="email" type="email" class="form-control ps-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                </div>
                                <input id="password" type="password" class="form-control ps-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

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

                            <p class="fw-light mt-1">Not a member yet? <a href="{{ route('register') }}" class="fw-bold">Resister!</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find all invalid inputs
        document.querySelectorAll('.is-invalid').forEach(function(input) {
            // Find the associated input-group-text and add error class
            let inputGroup = input.closest('.input-group');
            if (inputGroup) {
                let inputGroupText = inputGroup.querySelector('.input-group-text');
                if (inputGroupText) {
                    inputGroupText.classList.add('has-error');
                }
            }
        });
    });
</script>
