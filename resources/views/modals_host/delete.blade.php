<div class="modal fade" id="delete-acm-{{ $accommodation->id }}">
    <div class="modal-dialog">
        <div class="modal-content" style="border:4px #dcbf7d solid; border-radius: 20px;">
            <div class="modal-header">
                <h3 class="h5 modal-title" style="color:#004aad; font-weight: bold">
                    <i class="fa-solid fa-circle-exclamation"></i> Delete Accommodation
                </h3>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="h5">{{ $accommodation->name }}</h4>
                    <img src="#" alt="accommodation id {{ $accommodation->id }}" class="rounded mb-4">

                    <div>
                        <p><span><i class="fa-solid fa-comment icon-input"></i></span>{{ $accommodation->description }}</p>
                    </div>

                    <div>
                        <p><span><i class="fa-solid fa-location-dot icon-input"></i></span>{{ $accommodation->address }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-money-bill icon-input"></i></span>￥{{ $accommodation->price }}</p>
                    </div>

                    <div>
                        <p class="fw-bold"><span><i class="fa-solid fa-users icon-input"></i></span>{{ $accommodation->capacity }}</p>
                    </div>

                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('host.destroy', $accommodation->id) }}" method="post">
                    @csrf
                    @method("DELETE")

                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="border:1px solid #dcbf7d"> Cancel</button>
                    <button type="submit" class="btn btn-sm" style="color: #ffffff; background-color: #dcbf7d">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
