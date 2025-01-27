@extends('layouts.app')

@section('title', 'accommodation_create')

<style>
html,body
    {
        overflow-x:hidden;
        height: auto;

    }

    .bg-gold {
        background-color: #DCBF7D;
    }

    .w-45 {
         width: 45%;
    }
</style>

@section('content')

<div class="corner-circle circle-left-1" style="z-index:-1;"></div>
<div class="corner-circle circle-left-2" style="z-index:-1;"></div>
<div class="corner-circle circle-right-1" style="z-index:-1;"></div>
<div class="corner-circle circle-right-2" style="z-index:-1;"></div>

<div class="card w-50 mx-auto box-shadow bg-white">
    <h2 class="mt-4">Edit Accommodation!</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Name</label>
            <input type="text" class="form-control mx-auto" id="name" placeholder="Accommodation Name" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->name }}">
        </div>
        @error('name')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="address" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Address</label>
            <input type="text" class="form-control mx-auto" id="address" placeholder="Accommodation Address" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->address }}">
        </div>
        @error('address')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="price" class="form-label text-start w-100 ms-4 fw-bold">Price</label>
            <input type="number" class="form-control mx-auto" id="price" name="price" placeholder="Price" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->price }}">
        </div>
        @error('price')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="capacity" class="form-label text-start w-100 ms-4 fw-bold">Capacity</label>
            <input type="number" class="form-control mx-auto" id="capacity" name="capacity" placeholder="Capacity" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->capacity }}">
        </div>
        @error('capacity')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="city" class="form-label text-start w-100 ms-4 fw-bold">City Name</label>
            <input type="text" class="form-control mx-auto" id="city" placeholder="City Name" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->city }}">
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label text-start w-100 ms-4 fw-bold">Photo</label>
            <input type="file" name="photos[]" class="form-control mx-auto" id="photos" style="width: 95%; border-radius: 10px;" multiple>
            <p class="m-0 ms-4 text-start">You can display your portrait or farm picture in our market.</p>
            <p class="m-0 ms-4 text-start">Acceptable formats are jpeg, jpg, png, and gif only.</p>
            <p class="m-0 ms-4 text-start">The file size is 1048Kb.</p>
        </div>
        @error('photos')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label text-start w-100 ms-4 fw-bold">Description</label>
            <input type="text" class="form-control mx-auto" id="description" name="description" placeholder="Description (#hashtag)" style="width: 95%; border-radius: 10px;" value="{{ $accommodation->description, $accommodation->hashtag }}">
        </div>
        @error('description')
        <div class="text-danger small">{{ $message }}</div>
        @enderror



        <div class="form-check form-check-inline d-flex justify-content-center align-items-center flex-wrap w-50 mx-auto">

            @foreach ($all_categories as $category)
            <div class="form-check form-check-inline">
                <input type="checkbox" name="category[]" id="{{ $category->category_name }}" value="{{ $category->id }}" class="form-check-input">
                <label for="{{ $category->category_name }}" class="form-check-label">{{ $category->category_name }}</label>
            </div>
            @endforeach

            @error('category')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="bg-gold rounded border border-black text-white w-50 fs-2 my-4">Edit</button>

    </form>
</div>

@endsection
