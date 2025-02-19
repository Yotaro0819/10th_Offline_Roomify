@extends('layouts.app')

@section('title', 'Booking Form')

@section('content')

<div class="container">
    <div class="mt-3 w-75 mx-auto">
        <form action="#" method="post">
        @csrf
            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control mb-3" placeholder="Enter name">

            <!-- @error('guest_name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror -->

            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" name ="email" class="form-control mb-3" placeholder="example@gmail.com">

            <!-- @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror -->

            <label for="massage" class="form-label">Massage</label>
            <textarea class="form-control mb-3" name="massage" id="massage" cols="26" rows="10" placeholder="Type your massage here"></textarea>

            <!-- @error('special_request')
                <div class="text-danger small">{{ $message }}</div>
            @enderror -->
        </form>
    </div>

    <div class="mt-3 w-75 mx-auto mt-w3">
        <h1 class="text-center">Contact Options</h1>
        <div class="row d-flex align-items-center">
            <div class="col text-end">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="col">
                <div class="title2">Call Us</div>
                <div class="subtitle">+1 123 456 7890</div>
            </div>
        </div>
        <div class="item">
            <div class="frame">
            <div class="icon">🏢</div>
            </div>
            <div class="frame-427318906">
            <div class="title2">Visit Us</div>
            <div class="subtitle">123 Main Street, City, Country</div>
            </div>
            <img class="vector-2002" src="vector-2001.svg" />
        </div>
    </div>

</div>



@endsection
