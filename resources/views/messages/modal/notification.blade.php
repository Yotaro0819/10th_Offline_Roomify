
<div class="modal fade" id="notification-{{ $notification->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h5 modal-title">
                   【{{$notification->title}}】
                </h3>
            </div>
                <div class="modal-body modal-notification-body">
                    <p>{{$notification->notification}}</p>
                </div>
                <div class="modal-footer border-0">

                    <div>
                        <p class="text-end">{{$notification->created_at}}</p>
                        <div class="w-25 mx-auto">
                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>

