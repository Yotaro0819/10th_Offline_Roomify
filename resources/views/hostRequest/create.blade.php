@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/hostRequest/create.css')}}">
@section('content')

    @if (session('success'))
    <div class="success_message">
        <h3 class="m-0 message">{{ session('success') }}!</h3>
    </div>

    @else
    <div class="container w-50 mx-auto">
        <h2>Host Request</h2>

        <form action="{{ route('hostRequest.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Message (if you need)</label>
                <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Request</button>
        </form>
    </div>
    @endif

@endsection
