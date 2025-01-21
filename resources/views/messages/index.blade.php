@extends('layouts.app')

@section('title', 'message_index')

<style>

    .w-10 {
        width: 10%;
    }
    .w-85 {
        width: 85%;
    }

</style>
@section('content')


<div class="container w-75 mx-auto mt-5">
    <h2>Messages</h2>
    <div class="card rounded-5 w-85 mx-auto">


        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-50">
            </div>
            <div class="col-10">
                <p class="fs-5 text-start mt-3">User Name</p>
                <p class="fs-5 text-start">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>

        <hr class="mx-auto my-0" style="width:97%;">
        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-50">
            </div>
            <div class="col-10">
                <p class="fs-5 text-start mt-3">User Name</p>
                <p class="fs-5 text-start">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>

        <hr class="mx-auto my-0" style="width:97%;">
        <div class="row">
            <a href="#" class="d-flex text-black">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('asset_Araki/istockphoto-1300845620-612x612.jpg')}}" alt="avatar" class="w-50">
            </div>
            <div class="col-10">
                <p class="fs-5 text-start mt-3">User Name</p>
                <p class="fs-5 text-start">Hey! wasup bro! Appreciate you to choose my house... </p>
                <p class="mx-5 text-end">8:04 AM 12/10/2025</p>
            </div>
            </a>
        </div>


    </div>
</div>

@endsection
