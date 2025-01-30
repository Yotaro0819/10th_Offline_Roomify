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
        border: 1px solid #000000;
        border-radius: 30px;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.1);
        font-style: normal;
    }
    .icon-input
    {
        margin-right: 10px;
    }
</style>
@section('title', 'Accommodation Index for Host')

@section('content')
<h1 class="h2 mx-5">Accommodation Index</h1>
<div class="container w-75 mx-auto text-end ms-5">
    <p class="fw-bold fs-4">Register your new accommodation <a href="{{ route('host.accommodation.create')}}" class="btn bg-secondary text-white">Register</a></p>
</div>
@if($all_accommodations->isNotEmpty())
    @foreach($all_accommodations as $accommodation)
        <a href="#" class="card mx-auto mb-5 w-75" id="acm-booking">
            <div class="row">
                <div class="col my-3">
                    <img src="#" alt="#">
                </div>

                <div class="col text-start">
                    <h2 class="h3 my-2 fw-bold" style="color:#004aad">{{ Str::limit($accommodation->name, 30) }}</h2>

                    <div>
                        <p><span><i class="fa-solid fa-comment icon-input"></i></span>{{ Str::limit($accommodation->description, 40) }}</p>
                    </div>

                    <div>
                        <p><span><i class="fa-solid fa-location-dot icon-input"></i></span>{{ Str::limit($accommodation->address, 40) }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-money-bill icon-input"></i></span>￥{{ $accommodation->price }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-users icon-input"></i></span>{{ $accommodation->capacity }}</p>
                    </div>
                </div>

                <div class="col my-auto">
                    <button class="btn text-white" style="background-color: #A5A5A5" data-bs-toggle="modal" data-bs-target="#delete-acm-{{ $accommodation->id }}"><i class="fa-solid fa-trash-can"></i> Delete</button>
                    <button class="btn text-white" style="background-color: #dcbf7d"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>
        </a>
        @include('modals_host.delete')
    @endforeach
@else
    <h3 class="text-muted text-center mt-3"> No Accomodations Yet</h3>
@endif

    <div class="d-flex justify-content-center">
        {{ $all_accommodations->links('pagination::simple-tailwind', ['class' => 'pagination']) }}
    </div>
@endsection
