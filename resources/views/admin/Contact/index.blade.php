@extends('layouts.app')

@section('title', 'Admin: message')

@section('content2')

<div class="container">
    <h1 class="title">Messages</h1>
    <div class="card">
    <div class="card-body p-0">
            <div class="row align-items-center border-bottom p-2">
                <div class="col">
                    <i class="fa-solid fa-envelope fs-1"></i>
                </div>
                <div class="col">
                    <div class="title2">From: Jane</div>
                    <div class="subtitle">Message: I want to know....</div>
                </div>
                <div class="col">
                    <div>Just Now</div>
                    <div>2025/03/25</div>
                </div>
            </div>
            <div class="row align-items-center p-2">
                <div class="col">
                    <i class="fa-solid fa-envelope fs-1"></i>
                </div>
                <div class="col">
                    <div class="title2">From: Jane</div>
                    <div class="subtitle">Message: I want to know....</div>
                </div>
                <div class="col">
                    <div>Just Now</div>
                    <div>2025/03/25</div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>






@endsection