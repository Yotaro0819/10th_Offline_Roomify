@extends('layouts.app')

@section('title', 'coupon')

@section('content')

<div class="container">
<a href="{{ route('home')}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Go back to Home</a>
<h1 class="text-center mt-3">
    Your order is canceled
</h1>
@if(isset($accommodation_id))
    <h3>
        <a href="{{ route('guest.booking.create', $accommodation_id) }}" class="text-black"><i class="fa-solid fa-angles-left"></i>Try to book again</a>
    </h3>
@else
    <div></div>
@endif

@endsection