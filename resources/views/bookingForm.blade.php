@extends('layouts.app')

@section('title', 'Booking Form')

@section('content')
<style>
    .form-control
    {
        border-color: #A5A5A5;
    }

    #acm-booking
    {
        border: solid, 4px, #dcbf7d;
        border-radius: 30px;
        width:400px;
        height: 300px;
        align-items: left;
    }

    h1
    {
        color: #004aad;
        font-size: 40px;
        font-weight: bolder;
    }

    .btn
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        width: 400px;
        align-content: left;
        font-weight: bold;
        width: 100%;
    }

    .btn:hover
    {
        border-color:#004aad;
        color: #004aad;
        background-color: transparent;
    }

    .price
    {
        text-align: right;
    }

    a
    {
        color: #004aad;
    }

    img
    {
        width: 150px;
        height: 100px;
        border-radius: 30px;
    }
</style>

<div class="row gx-5 mx-auto">
    <h1 class="ms-5"><a href="#">< </a> BOOK YOUR STAY</h1>

    <!-- left side -->
    <div class="col-7 w-50">
        <form action="#" method="post">
        @csrf

        <div class="row my-4">
            <div class="col">
                <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="col">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="example@gmail.com">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="num_of_guest" class="form-label">Number of Guest<span class="text-danger">*</span></label>
                <input type="number" class="form-control w-75" placeholder="1 adult - 1 room">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="arrival_date" class="form-label">Arrival Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control w-75">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="departure_date" class="form-label">Departure Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control w-75">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Use a coupon<span class="text-danger">*</span></label>
                <div>
                    <input type="radio" id="couponYes" name="use_coupon" value="yes">
                    <label for="couponYes" class="me-5">Yes</label>

                    <input type="radio" id="couponNo" name="use_coupon" value="no">
                    <label for="couponNo">No</label>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="special_request" class="form-label">Special Request</label>
                <textarea class="form-control" name="special_request" id="special_request" cols="26" rows="10" placeholder="type your massage here"></textarea>
            </div>
        </div>
    </div>

    <!-- right side -->
    <div class="col-5 mt-5" id="acm-booking">
        <div class="row">
            <div class="col">
                <img src="#" alt="#">
            </div>
            <div class="col">
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing....
                </div>
            </div>
        </div>

        <hr style="color: #dcbf7d">

        <div class="row">
            <div class="col">
                <h2 class="h4">Price Details</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">₱1,273 x 23 nights</div>
            <div class="col price">₱2,451.32</div>
        </div>

        <div class="row">
            <div class="col">Cleaning Fee</div>
            <div class="col price">₱2,983.12</div>
        </div>

        <div class="row">
            <div class="col">Roomify Service Fee</div>
            <div class="col price">₱1,221.34</div>
        </div>

        <hr style="color: #dcbf7d">

        <div class="row">
            <div class="col">
                <h2 class="h4">Total fee</h2>
            </div>
            <div class="col price">₱106,601.99</div>
        </div>

        <div class="row mt-5">
            <div class="col me-5">
                <button type="submit" class="btn"><span class="fw-light">Send a Request</span></button>
            </div>
        </div>
    </div>
        </form>
</div>
@endsection
