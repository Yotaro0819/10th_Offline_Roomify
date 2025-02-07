@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content2')

<style>
    
.card
{
    width: 200px;
    height: 250px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.card img {
    width: 100%;
    height: 33%;
    object-fit: cover;
}

/* .username{
    color: #dcbf7d;
} */

.button-inactivate{
            padding: 10px 20px;
            font-size: 12px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100px;
            height: 30px;
            display: flex;
            align-items: center; 
        }

.button-activate {
    padding: 10px 20px;
    font-size: 14px;
    color: white;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width:  100px;
    height: 30px;
    display: flex;
    align-items: center; 
}

.name ,.address ,.user
{
    overflow-x: auto;
    height: auto;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}

</style>

<div class="row">
    <h3 class="col">
        Accomodation list
    </h3>
    <div class="col">
        <form action="{{ route('admin.accommodation.search') }}" class="w-50">
            <input type="search" name="search" class="form-control" placeholder="Search...." style="border: 1px solid #ccc;">
        </form>
    </div>
</div>
<div class="row d-flex justify-content-start">
@if($all_accommodations->isNotEmpty())
    @foreach($all_accommodations as $accommodation)
    <div class="col-auto">
        <div class="card">
            <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="text-start m-0 name">{{ $accommodation->name }}</p>
                <p class="m-0 text-start address">{{ $accommodation->address }}</p>
                <p class="username m-0 text-start user">{{ $accommodation->user->name }}</p>
                @if($accommodation->trashed())
                <div class="d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-circle text-danger "></i> &nbsp; Deactivate
                </div>
                <div class="d-flex justify-content-center">
                <button class="button-activate text-center" data-bs-toggle="modal" data-bs-target="#activate-accommodation-{{ $accommodation->id }}">Activate</button>
                </div>
                @else
                <div class="d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-circle text-success "></i> &nbsp; Activate
                </div>
                <div class="d-flex justify-content-center">
                <button class="button-inactivate text-center" data-bs-toggle="modal" data-bs-target="#deactivate-accommodation-{{ $accommodation->id }}">Deactivate</button>
                </div>
                @endif
                {{-- include a model here --}}
                @include('admin.accommodation.modal.status')
            </div>
        </div>
    </div>
    @endforeach
@else
<div>No Accommodation</div>
@endif
</div>               
@endsection
