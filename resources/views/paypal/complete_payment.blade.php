@extends('layouts.app')

@section('title', 'coupon')

@section('content')

<div class="container">

<a href="{{ route('home')}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Go back to Home</a>

<h1 class="mt-3 text-center">Payment Completed & Booking Successful !!</h1>
<h3 class="text-center ms-3">Enjoy your stay <i class="fa-regular fa-face-smile"></i></h3>

<div class="text-center mt-3">
<a href="{{ route('guest.reservation_guest')}}" class="text-primary fs-3"><i class="fa-solid fa-angles-left"></i>See Detail</a>
</div>

@endsection