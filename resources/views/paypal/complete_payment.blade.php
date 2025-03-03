@extends('layouts.app')

@section('title', 'coupon')

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.coupon-title {
font-family: 'Monoton', sans-serif;
font-size: 3rem;
text-align: center;
text-shadow: 
    2px 2px 4px rgba(0, 0, 0, 0.3),
    4px 4px 10px rgba(0, 0, 0, 0.2);
color: transparent;
position: relative;
transform: rotateX(10deg) rotateY(10deg);
}

.coupon {
    border: 2px solid #dcbf7d;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
    border-radius: 5px; 
    background-color: #fff;
    animation: fadeInUp 2s ease-out;
}

.coupon-right {
    border-right: 2px dashed #dcbf7d !important;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Monoton', sans-serif;
    padding:20px;

}

.coupon_price
{
    color: #004aad;
}

.button {
    border: none;
    background-color: transparent;
}

</style>

<div class="container">

<a href="{{ route('home')}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Go back to Home</a>

<h1 class="mt-3 text-center">Payment Completed & Booking Successful !!</h1>
<h3 class="text-center ms-3">Enjoy your stay <i class="fa-regular fa-face-smile"></i></h3>

<div class="text-center mt-3">
<a href="{{ route('guest.reservation_guest')}}" class="text-primary fs-3"><i class="fa-solid fa-angles-left"></i>See Detail</a>

@if(!empty($get_coupon))
    <h3 class="mt-5 mb-3">Get new coupon <i class="fa-solid fa-star"></i></h3>
    <div class="coupon mb-3 w-50 mx-auto">
    <button class="button d-flex align-items-center w-100">
    <div class="text-start coupon-right" style="width: 20%">
        COUPON
    </div>
    <div class="" style="width: 80%">
        <div >
            <p class="m-0 mt-2 coupon_price">{{ $get_coupon->name }}</p>
            
            <p class="m-0 mb-2">Expiration Date: {{ $get_coupon->expires_at }}</p>
        </div>
    </div>
    </button>
    </div>
@endif

</div>
@endsection