@extends('layouts.app')

@section('title', 'message_index')

<style>

    .w-10 {
        width: 10%;
    }
    .w-35 {
        width: 35%;
    }
    .w-85 {
        width: 85%;
    }

    .bg-gray {
        background-color: rgba(239, 239, 239, 0.884) !important;
    }

</style>
@section('content')


<div class="container w-75 mx-auto mt-5">
    <h2>Messages</h2>
    <div class="card rounded-4 w-85 mx-auto bg-gray">
        <div>
            <form action="#" class="w-25 m-4" style="position: relative;">
                <i class="fa-solid fa-magnifying-glass"
                    style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                <input type="search" name="search"
                        class="form-control"
                        placeholder="Search..."
                        style="padding-left: 35px; border: 1px solid #ccc;">
            </form>
        </div>


        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-35">
            </div>
            <div class="col-10">
                <p class="fs-5 text-start mt-3">User Name</p>
                <p class="text-start my-0">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end mb-1">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>

        <hr class="mx-auto my-0" style="width:97%;">
        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-35">
            </div>
            <div class="col-10">
                <p class="text-start mt-3">User Name</p>
                <p class="text-start my-0">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end mb-1">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>

        <hr class="mx-auto my-0" style="width:97%;">
        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-35">
            </div>
            <div class="col-10">
                <p class="text-start mt-3">User Name</p>
                <p class="text-start my-0">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end mb-1">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>


    </div>
</div>

@endsection
