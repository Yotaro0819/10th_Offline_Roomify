@extends('layouts.app')

@section('title', 'accommodation_create')

<style>
html,body
    {
        overflow: hidden;
        height: 100vh;
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
    <h2 class="mt-4">Register Accommodation!</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Name</label>
            <input type="text" class="form-control mx-auto" id="name" placeholder="Accommodation Name" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Name</label>
            <input type="text" class="form-control mx-auto" id="address" placeholder="Accommodation Address" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label text-start w-100 ms-4 fw-bold">City Name</label>
            <input type="text" class="form-control mx-auto" id="city" placeholder="City Name" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label text-start w-100 ms-4 fw-bold">Photo</label>
            <input type="file" class="form-control mx-auto" id="photo" style="width: 95%; border-radius: 10px;">
            <p class="m-0 ms-4 text-start">You can display your portrait or farm picture in our market.</p>
            <p class="m-0 ms-4 text-start">Acceptable formats are jpeg, jpg, png, and gif only.</p>
            <p class="m-0 ms-4 text-start">The file size is 1048Kb.</p>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-start w-100 ms-4 fw-bold">Description</label>
            <input type="text" class="form-control mx-auto" id="description" placeholder="Description (#hashtag)" style="width: 95%; border-radius: 10px;">
        </div>



        <div class="form-check form-check-inline d-flex justify-content-center align-items-center w-50 mx-auto">
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
        </div>


        <button type="submit" class="bg-gold rounded border border-black text-white w-50 fs-2 my-4">Register</button>

    </form>
</div>

@endsection
