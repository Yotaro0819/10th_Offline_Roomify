@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content2')

<style>

.select-box
{
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 20px;
    background-color: #004aad;
}

.select-box i
{
    color: white;
    font-size: 4rem;
    opacity: 0.2;

}

.select-box p
{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 18px;
    color: white;
    font-weight: bold;

}

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
<h1 class="col">
    Accomodation list
</h1>
<div class="col">
    <form action="{{ route('admin.accommodation.search') }}" class="w-50">
        <input type="search" name="search" class="form-control" placeholder="Search...." style="border: 1px solid #ccc;">
    </form>
</div>
</div>


<div class="row">
    
    <div class="col-6">
        <div class="row d-flex justify-content-start">
        @if($users->isNotEmpty())
            @foreach($users as $user)
                @foreach($user->accommodations as $accommodation)
                    <div class="col-auto">
                        <div class="card">
                            <img src="{{ $accommodation->photos->isNotEmpty() ? asset('storage/' . $accommodation->photos->first()->image) : 'https://via.placeholder.com/200x150?text=No+Image' }}" 
                            class="card-img-top" alt="Accommodation Image">
                            <div class="card-body">
                                <p class="text-start m-0 name">{{ $accommodation->name }}</p>
                                <p class="m-0 text-start address">{{ $accommodation->address }}</p>
                                <p class="username m-0 text-start user">{!! $user->highlighted_name !!}</p>
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
            @endforeach
        @else
        <h2 class="mt-5">
        No hit user's name
        </h2>
        @endif
        </div>
    </div>

    <div class="col-1" style="border-left: 2px solid #cccccc; padding: 0;"></div>

    <div class="col-5">
        <div class="row d-flex justify-content-start">
            @if($accommodations->isNotEmpty())
                @foreach($accommodations as $accommodation)
                        <div class="col-auto">
                            <div class="card">
                                <img src="{{ $accommodation->photos->isNotEmpty() ? asset('storage/' . $accommodation->photos->first()->image) : 'https://via.placeholder.com/200x150?text=No+Image' }}" 
                                class="card-img-top" alt="Accommodation Image">
                                <div class="card-body">
                                    <p class="text-start m-0 name">{!! $accommodation->highlighted_name !!}</p>
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
            <h2 class="mt-5">
            No hit Accommodation name
            </h2>
            @endif
        </div>
    </div>
</div>




@endsection
