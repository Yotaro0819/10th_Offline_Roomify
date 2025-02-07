@extends('layouts.app')

@section('title', 'Guest Booking Cancel')

@section('content')

<style>

.container{
    border-radius: 50px;
}

img 
{
    width: 100%;
    object-fit: cover;
    border-radius: 50px;
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
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
}

.con{
    border: 2px solid #ddd;          
    padding: 20px;                    
    background-color: #fff;           
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;                                       
    margin: 20px auto;                
}

.soft-highlight {
    background-color: #dcbf7d;
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
                    <h4 class="m-0 soft-highlight">
                    {{ \Carbon\Carbon::parse($booking->check_in_date)->format('Y/m/d') }} 〜 
                    {{ \Carbon\Carbon::parse($booking->check_out_date)->format('Y/m/d') }}
                    </h4>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <!-- <i class="fa-solid fa-circle-user"> -->
                    <i class="fa-solid fa-circle-user fs-3"></i>
                    <h4 class="m-0 ms-2">{{ $booking->user->name}}</h4>
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
                    <p>{{ $booking->accommodation->name }}</p>
                    <p>{{ $booking->user->name }}</p>
                    <p>{{ $booking->special_request ?? 'No special requests' }}</p>

                    @php
                        $check_in_date = \Carbon\Carbon::parse($booking->check_in_date);
                        $check_out_date = \Carbon\Carbon::parse($booking->check_out_date);
                        $stay_days = $check_out_date->diffInDays($check_in_date); // Calculate the number of stay days
                        $total_payment = $stay_days * $booking->accommodation->price; // Price * Stay days
                    @endphp

                    <p>
                        ¥{{ number_format(abs($total_payment)) }}
                    </p>
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
        <form action="{{ route('guest.guestCancel', ['bookingId' => $booking->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button-yes">Yes</button>
        </form>

    
            <a href="{{ route('guest.reservation_guest') }}" class="button-no">No</a>
        </div>
    </div>
</div>

@endsection