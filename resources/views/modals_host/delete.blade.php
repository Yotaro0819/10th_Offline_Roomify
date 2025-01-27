<div class="modal fade" id="delete-acm-{{ $accommodation->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i> Delete Accommodation
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this accommodation?</p>
                <div class="mt-3">
                    <img src="#" alt="accommodation id {{ $accommodation->id }}" class="image-lg">
                    <p class="mt-1 text-muted">{{ $accommodation->description }}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('accommodation.destroy', $accommodation->id) }}" method="post">
                    @csrf
                    @method("DELETE")

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
