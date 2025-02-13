
<div class="modal fade" id="notification-{{ $notification->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h5 modal-title">
                   【{{$notification->title}}】
                </h3>
            </div>
                <div class="modal-body modal-notification-body m-3">
                    <p>Notification:</p>
                    <p>{{$notification->notification}}</p>
                    <p>Sended date:</p>
                    <p>{{$notification->created_at}}</p>

                </div>
                <div class="modal-footer border-0">

                    <div>
                        <div>
                            <form action="{{route('notification.update', $notification->id)}}" method="post" class="notification-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Read</button>
                                <button type="button" class="close btn-sm" data-bs-dismiss="modal">Close</button>
                            </form>

                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>

