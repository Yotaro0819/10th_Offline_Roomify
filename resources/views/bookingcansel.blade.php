@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content')

<style>

img 
{
    width: 100%;
    object-fit: cover;
}

</style>

<div class="container border">
    <div class="row">
        <div class="col-4 mt-3">
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
        </div>
        <div class="col-8 mt-3">
            <div class="row">
                <div class="col-8">
                    <h4 class="m-0">YYY/DD/MM 〜 YYY/DD/MM</h4>
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
        <h3>Do you want to reservation?</h3>
        <p>If you cansel, the host will be noified that reservation has been canseled.</p>
    </div>
    <div class="justify-content-center">
        <button class="button-yes">Yes</button>
        <button class="button-no">No</button>
    </div>
</div>



@endsection