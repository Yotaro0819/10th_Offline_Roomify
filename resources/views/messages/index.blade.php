@extends('layouts.app')

@section('title', 'message_index')

<link rel="stylesheet" href="{{ asset('css/messages/messagesIndex.css')}}">

<style>
     .notification-section {
        min-height:200px;
        max-height: 500px;
        max-width: 300px;
        overflow-y: auto;
        overscroll:behavior: contain;
    }

    .notification {
        height: 100px;
        text-align:left;
    }
</style>
@section('content')
<div class="container mx-auto mt-4 mb-5" style="width: 70%;">
    <h2 style="margin-bottom:12.5px;">Messages</h2>
    <div class="d-flex">
        <div class="card rounded-4 w-85 mx-auto bg-gray">
            <div>
                <form action="{{ route('messages.search') }}" class="w-25 m-4" style="position: relative;">
                    <i class="fa-solid fa-magnifying-glass"
                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="search" name="search"
                            class="form-control"
                            placeholder="Search..."
                            style="padding-left: 35px; border: 1px solid #ccc;">
                </form>
            </div>

            <div class="userindex">
                @forelse ($all_users as $user)

                <div class="row">
                    <a href="{{ route('messages.show', $user->id)}}" class="d-flex text-black">
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        @if ($user->avatar)
                        <img src="{{asset('public/'.$user->avatar)}}" alt="avatar" class="w-35">
                        @else
                        <i class="fa-solid fa-user"></i>
                        @endif
                    </div>
                    <div class="col-10">
                        <p class="text-start mt-3">{{ $user->name }}</p>
                        <p class="text-start my-0">
                            {{-- 最新のメッセージがあれば表示 --}}
                            {{ $user->latest_message ? $user->latest_message->message : 'No messages yet.' }}
                        </p>
                        <p class="mx-5 text-end mb-1">
                            {{-- メッセージの作成日時を表示 --}}
                            {{ $user->latest_message ? $user->latest_message->created_at->format('H:i A m/d/Y') : '' }}
                        </p>
                    </div>
                    </a>
                    @if (!$loop->last)
                        <hr class="mx-auto my-0" style="width:97%;">
                    @endif
                </div>
                @empty

                @endforelse

            </div>
        </div>
        <div class="border ms-4 rounded-4">
            <h3 class="mt-4 text-center text-danger">Important infomations</h3>
            <div class="notification-section">
                @foreach ($notifications as $notification)
                <div class="card m-2">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#notification-{{ $notification->id }}">
                        See detail
                            <div class="card-body notification">
                                <p class="fw-bold">{{ $notification->title}}</p>
                            </div>
                    </button>
                </div>
                    @include('messages.modal.notification')
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
