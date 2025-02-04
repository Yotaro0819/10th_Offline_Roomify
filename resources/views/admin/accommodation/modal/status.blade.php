<div class="modal fade" id="deactivate-accommodation-{{ $accommodation->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Deactivate Accommodation
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to deactivate <span class="fw-bold">{{ $accommodation->name }}</span>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.accommodation.deactivate', $accommodation->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cansel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activate-accommodation-{{ $accommodation->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    Activate Accommodation
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to activate <span class="fw-bold">{{ $accommodation->name }}</span>
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('admin.accommodation.activate', $accommodation->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cansel</button>
                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>

