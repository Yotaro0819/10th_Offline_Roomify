@extends('layouts.app')

@section('title', 'Messages')
<link rel="stylesheet" href="{{ asset('css/messages/modal.css')}}">
<link rel="stylesheet" href="{{ asset('css/messages/messagesShow.css')}}">

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

@section('content')
<div class="container mx-auto my-5" style="width: 70%;">
<a href="{{ route('messages.index', $user->id)}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Back to the message page</a>

    <div class="d-flex">
        {{-- user info --}}
        <div class="card rounded-4 w-85 mx-auto d-flex p-0 mb-5">

        <div class="d-flex align-items-center">
            @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" class="w-10 m-2 imgs">
            @else
            <i class="fa-solid fa-user m-4" style="font-size: 40px;"></i>
            @endif
            <p class="fs-5 m-0">{{$user->name}}</p>
        </div>

        <div class="card-body pt-0 p-0">
            <div id="message-box" class="message-box mx-auto">
                <div class="messages">
                    @include('messages/receive')
                    @include('messages/receive')
                </div>
            </div>
        </div>

        <div class="card-footer bg-white w-100 p-0 rounded-bottom-4">
            {{-- form --}}
            <div class="mx-auto mt-3">
                {{-- <form action="{{ route('messages.store', $user->id) }}" method="post"> --}}
                    <form id="message-form">
                    {{-- @csrf --}}
                    <input type="hidden" id="receiver_id" value="{{ $user->id }}">
                    <input type="hidden" id="sender_id" value="{{ Auth::id() }}">
                    <textarea id="message" class="w-95 textarea-edit mx-auto" name="message" rows="2" placeholder=" textarea..." autoFocus></textarea>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn-send me-2 py-0">Send message</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="border ms-4 rounded-4">
            <h3 class="mt-4 text-center text-danger">Important informations</h3>
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

<script>
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: '{{config('broadcasting.connections.pusher.options.cluster')}}'});
    const channel = pusher.subscribe('public');
    const authId = {{ Auth::id() }};
    const messagerId = {{$user->id}};
    console.log("user: ", authId, "messager: ", messagerId);

    function displayMessage(message, sender) {
        // console.log("sending user" , sender, "receiving user: " , authId);
        let messageClass = (authId == sender ? "bg-primary send" : "bg-secondary receive");
        let formattedTime = new Date(message.created_at).toLocaleString();
        $(".messages").append(`
            <div class="message rounded text-white px-2 pt-1 w-50 ${messageClass}">
                <p class="text-start m-2">${message.message}</p>
                <p class="text-end">${formattedTime}</p>
            </div>`);
        $('#message-box').scrollTop($('.messages')[0].scrollHeight);
    }

    function refreshMessages() {
      $.get("/receive", {
          receiver_id : messagerId,
          sender_id   : authId
       })
      .done(function (res) {
        if (res.success) {
          $(".messages").html(""); // 一度メッセージをクリア
            res.messages.forEach(function (message) {
                // console.log('messages', message, "sender: ", message.sender_id);
            displayMessage(message, message.sender_id);
          });
        }
        // console.log('data',res);
      });
    }
    $(document).ready(function () {
      refreshMessages();
    });

    // Pusher のリアルタイム受信処理
    channel.bind('chat', function (message) {
        console.log('chat catch : ', message);
        console.log(message.receiver_id, message.sender_id)
        if(message.receiver_id == messagerId && message.sender_id == authId) {
            displayMessage(message, message.receiver_id);
        } else {
            console.log("something wrong");
        }
        $('#message-box').scrollTop($('.messages')[0].scrollHeight);
    });

    // メッセージ送信処理
    $("#message-form").submit(function (event) {
  event.preventDefault(); // デフォルトの送信を防ぐ

  const messageText = $("form #message").val().trim();
  if (messageText === "") return;

  const messagerId = $("form #receiver_id").val() || 0; // inputから取得
  const authId = $("form #sender_id").val() || 0;

  console.log("messagerId:", messagerId, "authId:", authId); // デバッグ用

  $.ajax({
    url: "/broadcast",
    method: "POST",
    headers: {
      "X-Socket-Id": pusher.connection.socket_id,
    },
    data: {
      _token: "{{csrf_token()}}",
      message: messageText,
      receiver_id: messagerId,
      sender_id: authId,
    },
  }).done(function (res) {
    if (res.success) {
        console.log("broadcast: ",res.data);
      displayMessage(res.data, res.data.sender_id);
      $("form #message").val("").focus();
    }
  });
});
</script>

@endsection
