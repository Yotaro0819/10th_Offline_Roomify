@extends('layouts.app')

<style>
    html,body{
        overflow: hidden;
    }
    body{
        background-color: #004aad !important;
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
        color:#ffffff !important;
        background-color: #dcbf7d !important;
    }
    .form-control, .form-select{
        border-color: #ffffff;
        background-color: transparent;
    }
    .card .card-header{
        color: #ffffff;
    }

    .input-group {
    position: relative;
    margin-bottom: 1rem;  /* Space for error message */
}

    .input-group .input-group-text{
        border: 1px solid #ffffff;
        border-right: 0;
        border-radius: 15px 0 0 15px;
        background-color:#004aad;
        width: 50px;
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
    .input-group input{
        outline: none;
        border: 1px solid #ffffff;
        border-left: 0;
        border-radius: 15px;
    }
    .input-group select{
        border-radius: 0 15px 15px 0;
        border-left: 0;
        background-color: transparent;
        color: #ffffff;
    }
    .input-icon{
        color:#ffffff;
        font-size: 28px;
    }
    .form-control:focus {
        color:#ffffff !important;
        box-shadow: none !important;
        border-color: #ffffff !important;
        background-color: #004aad !important;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 30px #004aad inset !important;
        -webkit-text-fill-color: #ffffff !important;
        transition: background-color 5000s ease-in-out 0s;
    }
    select:invalid{
        color:#D3D3D3;
        font-weight: bold
    }
    p{
        font-size: 18px;
        font-weight: lighter;
        color: #ffffff;
    }
    ::placeholder{
        color: #D3D3D3 !important;
        font-weight: bold;
    }
    a{
        color: #dcbf7d !important;
        font-style: italic;
    }
    /* design of circle */
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
                <div class="card-header border-0">
                    {{ __('Register') }}
                    <p>Please enter your information</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <div class="input-group-text">
                                    <i class="fa-regular fa-user input-icon"></i>
                                </div>
                                <input id="name" type="text" class="form-control ps-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                </span>
                                <input id="password" type="password" class="form-control ps-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <div class="text-danger small invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                </div>
                                <input id="password-confirm" type="password" class="form-control ps-2" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter Password">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 input-group" style="height: 37.3px">
                                <div class="input-group-text" style="height: 37.3px">
                                    <i class="fa-solid fa-earth-americas input-icon"></i>
                                </div>

                                <select class="form-select mb-3 ps-2" aria-label="Default select example" required>
                                    <option value="" selected><span> Nationality</span></option>
                                    <option value="1">🇯🇵 Japan</option>
                                    <option value="2">🇰🇷 Korea</option>
                                    <option value="3">🇦🇺 Australia</option>
                                    <option value="4">🇪🇸 Spain</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 mx-auto w-100">
                                <button type="submit" class="btn w-100 fw-bold" style="color:#dcbf7d; border-color: #dcbf7d">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            <p class="fw-light mt-1">Already have an Account? <a href="{{ route('login') }}" class="fw-bold">Login!</a></p>
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
