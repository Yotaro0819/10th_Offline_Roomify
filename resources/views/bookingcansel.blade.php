@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content')

<style>

img 
{
    width: 100%;
    object-fit: cover;
}

.button-yes{
            padding: 10px 20px;
            font-size: 12px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100px;
            height: 50px;
            margin-right: 30px;
}

.button-no{
            padding: 10px 20px;
            font-size: 12px;
            color: white;
            background-color: #dcbf7d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100px;
            height: 50px;
}

.con{
    border: 2px solid #ddd;          
    padding: 20px;                    
    background-color: #fff;           
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;                                       */
    margin: 20px auto;                
}

.soft-highlight {
    background-color: #ffeb3b;
    padding: 0 4px;
    border-radius: 3px;
    box-shadow: 0 0 8px rgba(255, 235, 59, 0.5);
    display: inline;
}

</style>

<div class="container con">
    <div class="row">
        <div class="col-4 mt-3">
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
        </div>
        <div class="col-8 mt-3">
            <div class="row">
                <div class="col-8">
                    <h4 class="m-0 soft-highlight">YYY/DD/MM 〜 YYY/DD/MM</h4>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <!-- <i class="fa-solid fa-circle-user"> -->
                    <i class="fa-solid fa-circle-user fs-3"></i>
                    <h4 class="m-0 ms-2">User Name</h4>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <p>Accommodation Name</p>
                    <p>Name</p>
                    <p>Special Request</p>
                    <p>Payment</p>
                </div>
                <div class="col-6">
                    <p>AAA apartment</p>
                    <p>aaa</p>
                    <p>bbb</p>
                    <p>¥9999</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <h3>Do you want to cansel reservation?</h3>
        <p>If you cansel, the host will be notified that reservation has been canseled.</p>
    </div>
    <div class="mb-3">
        <div class="d-flex justify-content-center">
            <button class="button-yes">Yes</button>
            <button class="button-no">No</button>
        </div>
    </div>
</div>

@endsection