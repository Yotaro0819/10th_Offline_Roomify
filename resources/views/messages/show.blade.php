@extends('layouts.app')

@section('title', 'Messages')

<style>
    .w-10 {
        width: 10%;
    }

    .w-35 {
        width: 35%;
    }

    .w-85 {
        width: 85%;
    }
    .w-95 {
        width: 95%;
    }

    .gray {
        background-color: rgba(239, 239, 239, 0.884);
    }

    .message-card {
    border-radius: 15px;
    border: 1px solid #e0e0e0;
    margin: 10px 0;
    padding: 10px;
    text-align: left; /* 中央揃えを解除 */
}


    .message-header {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .message-content {
        margin-bottom: 5px;
    }

    .message-time {
        font-size: 0.8rem;
        color: gray;
        text-align: right;
    }

    textarea {
        border-radius: 10px;
        resize: none;
        font-size: 1rem;
        padding: 0.5rem;
        width: 100%;

    }

    textarea:focus {
    outline: none;
    }

    .btn-send {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;

    }

    .btn-cancel {
        background-color: #6c757d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
    }

    .textarea-edit {
        border:none;
    }

    .message-box {
        min-height: 200px;
        max-height: 500px; /* 必要に応じて高さを設定 */
        overflow-y: auto; /* 垂直方向のスクロールを有効にする */
        border-top: 1px solid rgb(165, 165, 165);
        overscroll-behavior: contain;
    }
    .noMessage {
        height: 200px;
        display:flex;
        align-items:center;
        justify-content:center;
    }

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
