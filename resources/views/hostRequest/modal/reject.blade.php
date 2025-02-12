
<div class="modal fade" id="reject-request-{{ $request->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Reject this request
                </h3>
            </div>
            <form action="{{ route('admin.hostRequest.reject', $request->id) }}" method="POST" class="d-inline">
                <div class="modal-body">
                    @csrf
                    <textarea type="text" name="reason" class="form-control" placeholder="Reason"></textarea>
                    Are you sure you want to reject?
                </div>
                <div class="modal-footer border-0">


                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

