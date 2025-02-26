@extends('layouts.app')

@section('title', 'coupon')

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');

html,body,main
    {
        position: relative;
        min-height: 100vh;
    }

.coupon-title {
font-family: 'Monoton', sans-serif;
font-size: 3rem;
text-align: center;
color: #dcbf7d;
text-shadow: 
    2px 2px 4px rgba(0, 0, 0, 0.3),
    4px 4px 10px rgba(0, 0, 0, 0.2);
background: linear-gradient(135deg, #f9d976, #f39c12);
background-clip: text;
-webkit-background-clip: text;
color: transparent;
position: relative;
transform: rotateX(10deg) rotateY(10deg);
}

.coupon {
    border: 2px solid #dcbf7d;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
    border-radius: 10px; 
    background-color: white;
    
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

.star {
    width: 100px;
    height: 100px;
    background-color: #dcbf7d;
    clip-path: polygon(
        50% 0%, 61% 35%, 98% 35%, 
        68% 57%, 79% 91%, 50% 70%, 
        21% 91%, 32% 57%, 2% 35%, 
        39% 35%
    );
    position: absolute;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(0, 0, 0, 0.1);
    background: radial-gradient(circle, #f2e0a9, #dcbf7d);
    transform: rotateX(10deg) rotateY(10deg); 
    z-index: -1;
}

.star1
{
    width: 200px;
    height: 200px;
    top: 150px;
    left: 300px;
    transform: rotate(15deg); 
}

.star2 
{
    width: 150px;
    height: 150px;
    top: 400px;
    left: 200px;
    transform: rotate(30deg); 
}

.star3
{
    width: 50px;
    height: 50px;
    top: 200px;
    left: 100px;
    transform: rotate(15deg); 
}

.star4
{
    width: 500px;
    height: 500px;
    top: 150px;
    right: 350px;
    transform: rotate(45deg); 
}

.star5
{
    width: 150px;
    height: 150px;
    top: 100px;
    right: 200px;
    transform: rotate(45deg); 
}

.star6
{
    width: 100px;
    height: 100px;
    top: 450px;
    right: 100px;
    transform: rotate(15deg); 
}

.button {
    border: none;      
    background-color: transparent;
}

</style>

<div class="container">

    <div class="star star1"></div>
    <div class="star star2"></div>
    <div class="star star3"></div>
    <div class="star star4"></div>
    <div class="star star5"></div>
    <div class="star star6"></div>
    
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-5">
            <h1 class="coupon-title text-center">Your Coupon</h1>
            
            @if($all_coupones->isNotEmpty())
                @foreach($all_coupones as $coupon)
                    <div class="coupon mb-3">
                    <button class="button d-flex align-items-center w-100">
                    <div class="text-start coupon-right" style="width: 20%">
                        COUPON
                    </div>
                    <div class="" style="width: 80%">
                        <div >
                            <p class="m-0 mt-2 coupon_price">{{ $coupon->name }}</p>
                            
                            <p class="m-0 mb-2">Expiration Date: {{ $coupon->expires_at }}</p>
                        </div>
                    </div>
                    </button>
                    </div>
                @endforeach
            @else
                <h3 class="text-center mt-3">no available coupons</h3>
            @endif
        </div>
    </div>
</div>

@endsection