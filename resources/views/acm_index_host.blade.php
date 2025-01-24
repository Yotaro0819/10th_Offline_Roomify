@extends('layouts.app')
<style>
    img
    {
        width: 195px;
        height: 120px;
        border-radius: 15px;
        margin: 10px;
    }

    #acm-booking
    {
        border: 1px, solid, #000000;
        border-radius: 30px;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.1);
    }



</style>
@section('title', 'Accommodation Index for Host')

@section('content')
<h1 class="h2 mx-5">Accommodation Index</h1>
@if($user->accommodation->isNotEmpty())
    @foreach($all_accommodations as $accommodation)
        <div class="card mx-auto mb-5 w-75" id="acm-booking">
            <div class="row">
                <div class="col my-3">
                    <img src="#" alt="#">
                </div>

                <div class="col text-start">
                    <h2 class="h3 my-2 fw-bold" style="color:#004aad">{{ $accommodation->name }}</h2>

                    <div>
                        <p><span><i class="fa-solid fa-magnifying-glass me-3"></i></span>{{ $accommodation->description }}</p>
                    </div>

                    <div>
                        <p><span><i class="fa-solid fa-location-dot me-3"></i></span>{{ $accommodation->address }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-money-bill me-3"></i></span>{{ $accommodation->price }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-users"></i></span>{{ $accommodation->capacity }}</p>
                    </div>
                </div>

                <div class="col my-auto">
                    <button class="btn text-white" style="background-color: #A5A5A5"><i class="fa-solid fa-trash-can"></i> Delete</button>
                    <button class="btn text-white" style="background-color: #dcbf7d"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h3 class="text-muted text-center"> No Accomodations Yet</h3>
@endif

@endsection
