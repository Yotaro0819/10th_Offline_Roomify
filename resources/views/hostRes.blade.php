@extends('layouts.app')
<style>
    img
    {
        width: 195px;
        height: 120px;
        border-radius: 15px;
        margin: 15px;
    }
    #acm-booking
    {
        border: 1px, solid, #000000;
        border-radius: 30px;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #info{
        padding: 20px;
        text-align: left;
    }

    .date{
        text-decoration: border;
    }
    .start-date {
    
        padding: 5px;
        border-radius: 5px;
        font-weight: bold;
        font-family: arial
    }

    .end-date {
       
        padding: 5px;
        border-radius: 5px;
        font-weight: bold;
        font-family: arial
    }

    #spaced{
        margin-top: 15px;
    }

    .custom-btn {
        background-color: #dcbf7d;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 15px;
        text-align: center;
        display: inline-block;
        font-weight: bold;
        transition: background-color 0.3s ease;
        margin-top: 50px;
    }
</style>
@section('content')
<h1 class="h4 mx-5"><i class="fa-regular fa-clock"></i>Reservation Status</h1>
<div class="card mx-auto mb-4 w-75" id="acm-booking">
    <div class="row">
        <div class="col">
            <img src="#" alt="#">
        </div>
        <div class="col" id="info">
            <h5 class="date">
                <span class="start-date">YYYY/MM/DD</span> ~ 
                <span class="end-date">YYYY/MM/DD</span>
            </h5>
            <div class="row" id="spaced">
                <div class="col">Name</div>
                <div class="col">Member</div>
            </div>
            <div class="row" id="spaced">
                <div class="col">Acommodation name</div>
                <div class="col">Special request</div>
            </div>
        </div>
        <div class="col">
            <a href="#" class="custom-btn"><i class="fa-solid fa-trash"></i>Cancel</a>
        </div>

    </div>
</div>
@endsection




