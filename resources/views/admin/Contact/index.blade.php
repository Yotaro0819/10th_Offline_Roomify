@extends('layouts.app')

@section('title', 'Admin: message')

@section('content2')

<div class="container">
    <h1 class="title">Messages</h1>
    @if($all_contacts)
    @foreach( $all_contacts as $contact )
    <div class="card">
    <div class="card-body p-0">
            <div class="row align-items-center border-bottom p-2">
                <div class="col">
                    <i class="fa-solid fa-envelope fs-1"></i>
                </div>
                <div class="col">
                    <div class="title2">From: {{ $contact->name }}</div>
                    <div class="subtitle">Message: {{ $contact->message }}</div>
                </div>
                <div class="col">
                    <div>Just Now</div>
                    <div>{{ $contact->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
  </div>
</div>






@endsection