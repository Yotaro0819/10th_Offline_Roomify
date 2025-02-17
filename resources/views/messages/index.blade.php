@extends('layouts.app')

@section('title', 'message_index')
<script>
    $(document).ready(function() {
        // 通知の「Read」ボタンがクリックされたとき
        $('.notification-form').on('submit', function(e) {
            e.preventDefault();  // フォームの通常の送信を防ぐ

            const form = $(this);
            const notificationId = form.closest('.notification').attr('id').split('-')[1]; // notification-1 から 1 を取得

            $.ajax({
                url: form.attr('action'),
                type: 'PATCH',
                data: form.serialize(),  // フォームデータを送信
                success: function(response) {
                    // 成功した場合、通知を「既読」として表示
                    form.find('button').text('Already Read');
                    form.find('button').prop('disabled', true); // ボタンを無効化
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });
</script>

<link rel="stylesheet" href="{{ asset('css/messages/messagesIndex.css')}}">
<link rel="stylesheet" href="{{ asset('css/messages/modal.css')}}">

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
                    @if ($notification->status == 'read')
                        <div class="card m-2 read">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#notification-{{ $notification->id }}">
                                See detail
                                    <div class="card-body notification">
                                        <p class="fw-bold">{{ $notification->title}}</p>
                                    </div>
                            </button>
                        </div>
                    @elseif($notification->status === 'unread')
                        <div class="card m-2">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#notification-{{ $notification->id }}">
                                See detail
                                    <div class="card-body notification">
                                        <p class="fw-bold">{{ $notification->title}}</p>
                                    </div>
                            </button>
                        </div>
                    @endif

                    @include('messages.modal.notification')
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
