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
        border: solid 4px #dcbf7d;
        border-radius: 30px;
        width:400px;
        height: 350px;
        align-items: left;
    }
    .btn
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        font-weight: bold;
        width:400px;
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
    img
    {
        width: 150px;
        height: 100px;
        border-radius: 30px;
    }

    .ui-datepicker-range a
    {
        background-color: #dcbf7d !important;
        color: white !important;
    }
</style>


<script>
    var checkInDate = null;
    var checkOutDate = null;
    var perNightPrice = {{ $accommodation->price }};

    function highlightRange(date) {
        if (checkInDate && checkOutDate) {
            if (date >= checkInDate && date <= checkOutDate){
                return [true, "ui-datepicker-range"];
            }
        } else if (checkInDate && date.getTime() === checkInDate.getTime()) {
            return [true, "ui-datepicker-range"];
        }
        return [true, ""];
    }

    function calculateDays() {
    if (checkInDate && checkOutDate) {
        var diff = checkOutDate - checkInDate;
        var days = Math.round(diff / (1000 * 60 * 60 * 24));

        $("#total_days").text(days);
        $("#total_days_for_confirmation").text(days);

        if (days > 1) {
            $("#stay_label").text("nights stay");
        } else {
            $("#stay_label").text("night stay");
        }

        calculateTotalFee(days);
        return days;
    }
        return 0;
    }

    function calculateTotalFee(days) {
    var cleaningFee = {{ $cleaning_fee }} * days;
    var serviceFee  = {{ $service_fee }} * days;
    var stayFee     =  days * perNightPrice;
    var totalFee    = stayFee + cleaningFee + serviceFee;

    $("#cleaningFee").text(cleaningFee.toLocaleString());
    $("#serviceFee").text(serviceFee.toLocaleString());
    $("#stayFee").text(stayFee.toLocaleString());
    $("#total_fee_display").text(totalFee.toLocaleString());
    }


    $(document).ready(function() {
        $("#check_in_datepicker").datepicker({
            minDate: 1,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selectedDate) {
                checkInDate = $(this).datepicker('getDate');
                checkOutDate = null;
                $("#check_out_datepicker").val("");

                var minCheckOutDate = new Date(checkInDate);
                minCheckOutDate.setDate(minCheckOutDate.getDate() + 1);

                $("#check_out_datepicker").datepicker("option", "minDate", minCheckOutDate);
                $("#check_in_datepicker").datepicker("refresh");
                $("#check_out_datepicker").datepicker("refresh");
                calculateDays();
            },
            beforeShowDay: highlightRange
        });

        $("#check_out_datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 2,
            onSelect: function(selectedDate) {
                checkOutDate = $(this).datepicker('getDate');
                $("#check_in_datepicker").datepicker("refresh");
                $("#check_out_datepicker").datepicker("refresh");
                calculateDays();
            },
            beforeShowDay: highlightRange
        });
    });
</script>


<div class="row gx-5 mx-auto">
    <h1 class="h2 ms-5" style="font-size: 30px"><a href="{{ route('guest.search')}}">< </a> BOOK YOUR STAY</h1>

    <!-- left side -->
    <div class="col-7 w-50 mt-3">
        <form action="{{ route('paypal.payment', $accommodation->id )}}" method="post">
        @csrf

        <div class="row mb-4">
            <div class="col">
                <label for="name" class="form-label">Guest Name<span class="text-danger">*</span></label>
                <input type="text" name="guest_name" class="form-control" placeholder="Enter name">
            </div>
            <!-- error directive-->
            @error('guest_name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

            <div class="col">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" name ="guest_email" class="form-control" placeholder="example@gmail.com">
            </div>
            <!-- error directive-->
            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="num_of_guest" class="form-label">Number of Guest<span class="text-danger">*</span></label>
                <input type="number" name="num_guest" class="form-control w-75" placeholder="Maximum {{ $accommodation->capacity }} guests">
            </div>

            <!-- error directive-->
            @error('num_guest')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col">
                <label for="check_in_date" class="form-label">Arrival Date<span class="text-danger">*</span></label>
                <input type="text" name="check_in_date" class="form-control w-75"  id="check_in_datepicker" placeholder="Select Check-In Date">
            </div>

            <!-- error directive-->
            @error('check_in_date')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>


        <div class="row mb-4">
            <div class="col">
                <label for="check_out_date" class="form-label">Departure Date<span class="text-danger">*</span></label>
                <input type="text" name="check_out_date" class="form-control w-75"  id="check_out_datepicker" placeholder="Select Check-Out Date">

                <div class="form-text w-75 text-end">
                    <span id="total_days"></span> <span id="stay_label"></span>
                </div>
            </div>


            <!-- error directive-->
            @error('check_out_date')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
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
                <textarea class="form-control" name="special_request" id="special_request" cols="26" rows="10" placeholder="Type your massage here"></textarea>
            </div>

            <!-- error directive-->
            @error('special_request')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- right side -->
    <div class="col-5 mt-4 ms-4" id="acm-booking">
        <div class="row">
            <div class="col">
                @if($accommodation->photos->isNotEmpty())
                <img src="{{ asset('storage/'. $accommodation->photos[0]->image) }}" alt="#" class="my-3">
                @else
                <img src="#" alt="" class="my-3">
                @endif
            </div>
            <div class="col">
                <div>
                    <p class="fw-bold mt-3">{{ Str::limit($accommodation->name, 20) }}</p>
                    <p>{{ Str::limit($accommodation->address, 40) }}</p>
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
            <div class="col"><span>¥{{ $accommodation->price}} </span> /night x <span id="total_days_for_confirmation"></span></div>
            <div class="col price">¥ <span id="stayFee"></span></div>
        </div>

        <div class="row">
            <div class="col">Cleaning Fee</div>
            <div class="col price">¥ <span id="cleaningFee"></span></div>
        </div>

        <div class="row">
            <div class="col">Roomify Service Fee</div>
            <div class="col price">¥ <span id="serviceFee"></span></div>
        </div>

        <hr style="color: #dcbf7d">

        <div class="row">
            <div class="col">
                <h2 class="h4">Total fee</h2>
            </div>
            <div class="col price">¥ <span id="total_fee_display">{{ $total_fee }}</span></div>
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
