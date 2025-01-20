@extends('layouts.app')

@section('title', 'coupon')

@section('content')

<style>
    .background-star {
        width: 100%;
        height: 200px;
        background: url('') no-repeat center center;
        background-size: contain;
        text-align: center;
        line-height: 200px;
        color: white; 
    }
</style>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8">
            <h1 class="text-center"><i class="fa-regular fa-star"></i> Your Coupon</h1>
        </div>

        <div class="background-star">
            
        </div>
    </div>
</div>





@endsection