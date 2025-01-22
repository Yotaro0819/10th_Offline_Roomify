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

    .bg-gray {
        background-color: rgba(239, 239, 239, 0.884) !important;
        border-radius: 15px;
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
        border:none !important;
    }

    .card-body {
    max-height: 500px; /* 必要に応じて高さを設定 */
    overflow-y: auto; /* 垂直方向のスクロールを有効にする */
}
</style>

@section('content')
<div class="container mx-auto mt-5" style="width: 60%;">
<a href="#" class="text-black"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    {{-- user info --}}
    <div class="card rounded-4 w-85 mx-auto bg-gray  d-flex p-0">

            <div class="d-flex align-items-center">
                <img src="{{ asset('asset_Araki/istockphoto-1300845620-612x612.jpg') }}" alt="avatar" class="w-10 m-2">
                <p class="fs-5">hostname</p>
            </div>


    <div class="card-body pt-0">
        <div class="mx-auto mt-3">
            {{-- message box --}}
            {{-- my message --}}
            <div class="message-card bg-white">
                <div class="message-header text-end me-3">yourname</div>
                <div class="message-content">Nice to meet you hostname. I’m ~~ who made the reservation. I’m looking forward to see you.</div>
                <div class="message-time">8:04 AM 12/10/2025</div>
            </div>

            {{-- Message from the other side --}}
            <div class="message-card bg-white">
                <div class="message-header">hostname</div>
                <div class="message-content">Hey! Wasup bro! Appreciate you to choose my house! I promise you won’t regret it. Wishing you an amazing trip!</div>
                <div class="message-time">10:24 AM 12/10/2025</div>
            </div>

            {{-- your message --}}
            <div class="message-card bg-white">
                <div class="message-header  text-end me-3">yourname</div>
                <div class="message-content">Nice to meet you hostname. I’m ~~ who made the reservation. I’m looking forward to see you.</div>
                <div class="message-time">8:04 AM 12/10/2025</div>
            </div>

            {{-- Message from the other side --}}
            <div class="message-card bg-white">
                <div class="message-header">hostname</div>
                <div class="message-content">Hey! Wasup bro! Appreciate you to choose my house! I promise you won’t regret it. Wishing you an amazing trip!</div>
                <div class="message-time">10:24 AM 12/10/2025</div>
            </div>

             {{-- your message --}}
             <div class="message-card bg-white">
                <div class="message-header  text-end me-3">yourname</div>
                <div class="message-content">Nice to meet you hostname. I’m ~~ who made the reservation. I’m looking forward to see you.</div>
                <div class="message-time">8:04 AM 12/10/2025</div>
            </div>

            {{-- Message from the other side --}}
            <div class="message-card bg-white">
                <div class="message-header">hostname</div>
                <div class="message-content">Hey! Wasup bro! Appreciate you to choose my house! I promise you won’t regret it. Wishing you an amazing trip!</div>
                <div class="message-time">10:24 AM 12/10/2025</div>
            </div>
        </div>
    </div>

    <div class="card-footer bg-white w-100 p-0 rounded-bottom-4">
        {{-- form --}}
        <div class="mx-auto mt-3">
            <form >
                <textarea class="w-95 textarea-edit mx-auto" rows="2" placeholder=" textarea..."></textarea>
                <div class="d-flex align-items-center justify-content-end">
                    <button type="button" class="btn-send me-2 py-0">Send message</button>
                    <button type="button" class="btn-cancel me-3 py-0">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
