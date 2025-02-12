@extends('layouts.app')

@section('title', 'Messages')
<link rel="stylesheet" href="{{ asset('css/messages/modal.css')}}">
.css')}}">

@section('content')
<div class="container mx-auto my-5" style="width: 70%;">
<a href="{{ route('messages.index', $user->id)}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    <div class="d-flex">
        {{-- user info --}}
        <div class="card rounded-4 w-85 mx-auto d-flex p-0">

                <div class="d-flex align-items-center">
                    @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" class="w-10 m-2">
                    @endif
                    <i class="fa-solid fa-user m-4" style="font-size: 40px;"></i>
                    <p class="fs-5 m-0">{{$user->name}}</p>
                </div>


        <div class="card-body pt-0 p-0">
            <div class="message-box mx-auto mt-3">
                {{-- message box --}}
                {{-- my message --}}

                @forelse ($all_messages as $message)
                    <div class="message-card bg-white w-75 mb-2 m-4"
                        style="float: {{ $message->sender->id == Auth::user()->id ? 'left' : 'right' }};">
                        <div class="message-header {{ $message->sender->id == Auth::user()->id ? 'text-start' : 'text-end' }} me-3">
                            {{ $message->sender->name }}
                        </div>
                        <div class="message-content {{ $message->sender->id == Auth::user()->id ? 'text-start' : 'text-end' }}">
                            {{ $message->message }}
                        </div>
                        <div class="message-time text-end">{{ $message->created_at }}</div>
                    </div>
                @empty
                <div class="noMessage">
                    <p class="my-4 fs-4">No messages yet.</p>

                </div>
                @endforelse

            </div>
        </div>

        <div class="card-footer bg-white w-100 p-0 rounded-bottom-4">
            {{-- form --}}
            <div class="mx-auto mt-3">
                <form action="{{ route('messages.store', $user->id) }}" method="post">
                    @csrf
                    <textarea class="w-95 textarea-edit mx-auto" name="message" rows="2" placeholder=" textarea..."></textarea>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn-send me-2 py-0">Send message</button>
                    </div>
                </form>
            </div>
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
