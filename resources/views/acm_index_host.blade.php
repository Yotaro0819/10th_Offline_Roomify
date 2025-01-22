@extends('layouts.app')
<style>
    img
    {
        width: 195px;
        height: 120px;
        border-radius: 15px;
        margin: 15px;
    }
</style>
@section('title', 'Accommodation Index for Host')

@section('content')
<h1 class="h2 mx-5">Accommodation Index</h1>
<div class="card mx-auto mb-4 w-75" id="acm-booking">
    <div class="row">
        <div class="col">
            <img src="#" alt="#">
        </div>

        <div class="col">
            <h2 class="h4 fw-bold" style="color:#004aad">Accommodation name</h2>

            <div>
                <p><span><i class="fa-solid fa-magnifying-glass me-3"></i></span>Lorem, ipsum dolor sit amet consectetur.</p>
            </div>

            <div>
                <p><span><i class="fa-solid fa-location-dot me-3"></i></span>1-412-342, Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, deleniti!</p>
            </div>

            <div>
                <p class="fw-bold"><span><i class="fa-solid fa-money-bill me-3"></i></span>123,421</p>
            </div>
        </div>
    </div>
</div>
@endsection
