@extends('layouts.app')

@section('title', 'Booking Form')

@section('content')

<style>

.btn
{
    border-color:#004aad;
    color: #ffffff;
    background-color: #004aad;
    font-weight: bold;
    width:400px;
}

.btn:hover
{
    border-color:#004aad;
    color: #004aad;
    background-color: transparent;
}

</style>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container w-75">
    <h1 class="text-center">Contact</h1>
    <h3>Contact form</h3>
    <div class="mt-3 mx-auto">
        <form action="{{ route('contact.store') }}" method="post">
        @csrf
            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control mb-3" placeholder="Enter name" value="{{ old('name') }}">

            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" name ="email" class="form-control mb-3" placeholder="example@gmail.com" value="{{ old('email') }}">

            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

            <label for="message" class="form-label">Massage</label>
            <textarea class="form-control mb-3" name="message" id="message" cols="26" rows="10" placeholder="Type your massage here" value="{{ old('message') }}"></textarea>

            @error('message')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

            <div class="text-center">
            <button type="submit" class="btn"><span class="">Send a Massage</span></button>
            </div>

        </form>
    </div>

    <div class="mt-3">
        <h3 class="">Contact Options</h3>
        <div class="col d-flex align-items-center">
            <i class="fa-solid fa-phone fs-3"></i>
            <div class="ms-2">
                <div class="title2">Call Us</div>
                <div class="subtitle">+1 123 456 7890</div>
            </div>
        </div>

        <hr class="border border-secondary">

        <div class="col d-flex align-items-center mt-3">
            <i class="fa-solid fa-building fs-3"></i>
            <div class="ms-2">
                <div class="title2">Visit Us</div>
                <div class="subtitle">123 Main Street, shibuya, Tokyo </div>
            </div>
        </div>

        <hr class="border border-secondary">

    </div>

    <div class="mt-5">
        <h3 class="">Business hours</h3>
        <div>Monday-Friday</div>
        <p class="small bg-secondary text-white px-2 py-1 d-inline-block rounded mb-0">weekdays</p>
        <p>AM9:00~PM5:00</p>
        
        <hr class="border border-secondary">

        <div>Satuday</div>
        <p class="small bg-secondary text-white px-2 py-1 d-inline-block rounded mb-0">weekend</p>
        <p>AM10:00~PM2:00</p>

        <hr class="border border-secondary">
    </div>

    <div id="map" style="height: 400px; width: 100%;"></div>

    <script>
    const apiKey = {!! json_encode(config('services.google_maps.api_key')) !!}; 

    function initMap() {
        var location = { lat: 35.659108, lng: 139.698388 };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }

    function loadGoogleMaps() {
        let script = document.createElement("script");
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }

    loadGoogleMaps();
    </script>

</div>

@endsection
