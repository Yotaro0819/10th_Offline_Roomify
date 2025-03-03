@extends('layouts.app')
@section('title', 'Accommodation Index for Host')
<style>
    #acm-booking
    {
        border: 1px solid #000000;
        border-radius: 30px;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .icon-input
    {
        margin-right: 10px;
    }

</style>

@section('content')
<h1 class="h2 mx-5">Accommodation Index</h1>
<div class="container text-end mx-auto">
    <a href="{{ route('host.accommodation.create')}}" style="margin-right: 120px"><i class="fa-solid fa-circle-plus"></i> <span class="fs-5">Register your new accommodation</span></a>
</div>
@if($all_accommodations->isNotEmpty())
    @foreach($all_accommodations as $accommodation)
        <div class="card mx-auto mb-4 w-75" id="acm-booking">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <a href="{{ route('accommodation.show', $accommodation->id) }}">
                        <img src="{{ asset('storage/' . ltrim($accommodation->photos[0]->image, '/')) }}" alt="#" style="width: 250px; height: 160px; border-radius: 15px; margin: 50px">
                    </a>
                </div>

                <div class="col-md-5 text-start">
                    <h2 class="h3 my-2 fw-bold">
                        <a href="{{ route('accommodation.show', $accommodation->id) }}" style="color:#004aad">{{ Str::limit($accommodation->name, 30) }}</a>
                    </h2>
                    <p><i class="fa-solid fa-comment icon-input"></i>{{ Str::limit($accommodation->description, 40) }}</p>
                    <p><i class="fa-solid fa-location-dot icon-input"></i>{{ Str::limit($accommodation->address, 40) }}</p>
                    <p class="fw-bold"><i class="fa-solid fa-money-bill icon-input"></i>￥{{ $accommodation->price }}</p>
                    <p class="fw-bold"><i class="fa-solid fa-users icon-input"></i>{{ $accommodation->capacity }}</p>
                </div>

                <div class="col-md-3">
                    <button class="btn text-white" style="background-color: #A5A5A5" data-bs-toggle="modal" data-bs-target="#delete-acm-{{ $accommodation->id }}"><i class="fa-solid fa-trash-can"></i> Delete</button>
                    <a href="{{ route('host.accommodation.edit', $accommodation->id )}}" class="btn text-white" style="background-color: #dcbf7d"><i class="fa-solid fa-pen"></i> Edit</a>
                </div>
            </div>
        </div>
        @include('modals_host.delete')
    @endforeach
@else
    <h3 class="text-muted text-center mt-3"> No Accomodations Yet</h3>
@endif
    <div class="d-flex justify-content-center">
        {{ $all_accommodations->links('pagination::simple-tailwind', ['class' => 'pagination']) }}
    </div>
@endsection
