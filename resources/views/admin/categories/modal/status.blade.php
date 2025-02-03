<div class="modal fade" id="delete-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    Delete category
                </h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span class="fw-bold">{{ $category->category_name }}</span>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cansel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    Edit category
                </h3>
            </div>
            <div class="modal-body border-0">
                <form action="{{ route('admin.category.edit', $category->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="row gx-2 mb-3 d-flex align-items-center">
                        <div class="col-10">
                            <input type="text" name="name" class="form-control" value="{{ old ('name',$category->category_name) }}" autofocus>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i>Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

