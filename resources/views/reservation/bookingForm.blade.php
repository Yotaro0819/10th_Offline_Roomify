@extends('layouts.app')

@section('title', 'Booking Form')

@section('content')
<style>
    .form-control{
        border-color: #A5A5A5;
    }

    #acm-booking{
        border: solid 4px #dcbf7d;
        border-radius: 30px;
        width: 400px;
        height: 370px;
        align-items: left;
    }

    .row .btn{
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        font-weight: bold;
        width:400px;
    }

    .row .btn:hover{
        border-color:#004aad;
        color: #004aad;
        background-color: transparent;
    }

    .price{
        text-align: right;
    }


    img{
        width: 150px;
        height: 100px;
        border-radius: 30px;
    }

    .daterangepicker .applyBtn,
    .daterangepicker .cancelBtn {
        font-size: 16px;
        width: 100px;
        height: 30px;
    }

    .daterangepicker .cancelBtn {
        border-color: #6c757d;
    }

    #coupon-display{
        margin: 10px 0 0 20px;
    }

</style>

<div class="row gx-5 mx-auto">
    <h1 class="h2 ms-5" style="font-size: 30px"><a href="{{ route('guest.search')}}">< </a> BOOK YOUR STAY</h1>
    <div class=" my-4 ms-5">
        <a href="{{ route('accommodation.show', $accommodation->id)}}" class="text-black fs-5"><i class="fa-solid fa-angles-left"></i> Back to the detail page</a>
    </div>
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
                <label for="daterange" class="form-label">Date<span class="text-danger">*</span></label>
                <input type="text" id="daterange" class="form-control w-75" name="daterange" value="{{ request()->input('daterange') }}" placeholder="Check In - Check Out Date" required>
                <p class="form-text w-75 text-end"><span id="total_days"></span></p>
            </div>

            <!-- error directive-->
            @error('daterange')
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
                <div id="coupon-display">
                    <!-- show coupons -->

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
                    <img src="{{ asset('storage/' . ltrim($accommodation->photos[0]->image, '/')) }}" alt="#">

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
                <div class="col"><span>¥{{ $accommodation->price}}</span>/night x <span id="total_days_for_confirmation"></span></div>
                <div class="col price"><span id="stayFee"></span></div>
            </div>

            <div class="row">
                <div class="col">Cleaning Fee</div>
                <div class="col price"><span id="cleaningFee"></span></div>
            </div>

            <div class="row">
                <div class="col">Roomify Service Fee</div>
                <div class="col price"><span id="serviceFee"></span></div>
            </div>

            <!-- discount -->
            <div class="row">
                <div class="col">Discount</div>
                <div class="col price text-danger fw-bold"><span id="coupon-discount"></span></div>
            </div>

            <hr style="color: #dcbf7d">

            <div class="row">
                <h2 class="col h4">Total fee</h2>
                <div class="col price" id="total_fee_display"></div>
            </div>

            <div class="row mt-5">
                <div class="col me-5">
                    <button type="submit" class="btn"><span class="fw-light">Send a Request</span></button>
                </div>
            </div>
        </div>
        </form>
</div>
<script>
    var startDate = null;
    var endDate = null;
    var perNightPrice = {{ $accommodation->price }};

    function calculateDays() {
        if (startDate && endDate) {
            var diff = endDate.getTime() - startDate.getTime();
            var days = Math.round(diff / (1000 * 60 * 60 * 24));

            var nights = days - 1;

            if (nights < 1) {
                nights = 1;
            }

            $("#total_days").text(nights);
            $("#total_days_for_confirmation").text(nights);

            if (nights > 1) {
                $("#total_days").text("Total : " + nights + " nights stay");
            } else {
                $("#total_days").text("Total : " + nights + " night stay");
            }

            calculateTotalFee(nights);
            return nights;
        }
        return 0;
    }

    function calculateTotalFee(nights) {
        var cleaningFee = {{ $cleaning_fee }};
        var serviceFee  = {{ $service_fee }} * nights;
        var stayFee     = nights * perNightPrice;
        var totalFee    = stayFee + cleaningFee + serviceFee;

        // calculate fee with coupon
        var selectedCouponDiscount = parseFloat($('input[name="selected_coupon"]:checked').data('discount')) || 0;
        var discountAmount = Math.floor((totalFee * selectedCouponDiscount) / 100);
        var finalFee = totalFee - discountAmount;

        $('#finalFee').val(finalFee);

        $("#cleaningFee").text(`¥ ${cleaningFee.toLocaleString()}`);
        $("#serviceFee").text(`¥ ${serviceFee.toLocaleString()}`);
        $("#stayFee").text(`¥ ${stayFee.toLocaleString()}`);
        $("#total_fee_display").text(totalFee.toLocaleString());

        // show fee with discount
        if (selectedCouponDiscount > 0) {
            $("#coupon-discount").html(`- ¥${discountAmount.toLocaleString()} (${selectedCouponDiscount}% off)`);
        } else {
            $("#coupon-discount").html('¥ 0');
        }

        $("#total_fee_display").text(`¥ ${finalFee.toLocaleString()}`);
    }

    $(document).ready(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(1, 'days').format('YYYY-MM-DD'),
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            startDate = picker.startDate.toDate();
            endDate = picker.endDate.toDate();

            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));

            calculateDays();
        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            startDate = null;
            endDate = null;
            calculateDays();
        });
    });

    // coupon
    $(document).ready(function() {
    $('#couponYes').on('click', function() {
        $.ajax({
            url: '/user/' + {{ auth()->id() }} + '/coupons',
            type: 'GET',
            success: function(data) {
                if (data.length > 0) {
                    let couponsHtml = '<form>';
                    data.forEach(function(coupon, index) {
                        couponsHtml += `
                            <div>
                                <input type="radio" id="coupon_id" name="selected_coupon" value="${coupon.id}" data-discount="${coupon.discount_value}">
                                <label for="coupon_${index}">${coupon.name} - (Expiry Date: ${coupon.expires_at})</label>
                            </div>`;
                    });
                    couponsHtml += '</form>';
                    $('#coupon-display').html(couponsHtml);
                } else {
                    $('#coupon-display').html('<p>No coupon available</p>');
                }
            },
            error: function() {
                $('#coupon-display').html('<p>unable to get coupons</p>');
            }
        });
    });

    // re calculate total fee
    $(document).on('change', 'input[name="selected_coupon"]', function() {
        var nights = calculateDays();
        calculateTotalFee(nights);
    });

    // if no coupon
    $('#couponNo').on('click', function() {
        $('#coupon-display').empty();
        var nights = calculateDays();
        calculateTotalFee(nights);
    });
});
</script>

@endsection
