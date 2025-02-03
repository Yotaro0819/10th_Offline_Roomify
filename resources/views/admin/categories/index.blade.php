@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content2')

<style>

.select-box
{
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 20px;
    background-color: #004aad;
}

.select-box i
{
    color: white;
    font-size: 4rem;
    opacity: 0.2; 
    
}

.select-box p
{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 20px;
    color: white;
    font-weight: bold;

}

.add-button
{
    background-color: #004aad;
    border-radius: 15px;
    font-size: 15px;
    width: 100%;
    color: white;
    border: none;
}

.add-button, .form-control {
    height: 50px;
}

.table {
    border: 1px solid #000;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.table th, .table td {
    border: none;
}

.pagenate {
  transform: translate(-150px);
}

</style>

<main class="mt-3">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-users"></i>
                            </div>
                            <p class="mt-3 ">
                                Users
                            </p>
                        </div>
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-house-chimney"></i>
                            </div>
                            <p class="mt-3 ">
                                Accommodate
                            </p>
                        </div>
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-tags"></i>
                            </div>
                            <p class="mt-3 ">
                                Categories
                            </p>
                        </div>
                    </div>

                    <div class="col-10">
                        <h2>
                            Categories
                        </h2>
                        <form action="{{ route('admin.category.store')}}">
                        <div class="row gx-2 mb-3">
                                <div class="col-5">
                                    <input type="text" name="name" placeholder="Add a category..." class="form-control border">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="add-button"><i class="fa-solid fa-plus"></i>Add</button>
                                </div>
                        </div>
                        </form>
                        
                        @if($all_categories->isNotEmpty())
                            <div class="row">
                                <div class=col-7>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th class="text-center" style="font-size: 20px;">Categories</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        @foreach($all_categories as $index => $category)
                                        <tbody class="align-middle">
                                            <tr class="{{ $index % 2 == 0 ? 'table-warning' : '' }}">
                                                <td class="text-center"><i class="fa-solid fa-tags"></i>{{ $category->category_name }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#delete-category-{{ $category->id }}">
                                                        <i class="fa-solid fa-trash-can text-white"></i> 
                                                    </button>
                                                    <button class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @include('admin.categories.modal.status')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @else
                        <div>No Category</div>
                        @endif
                        <div class="text-center pagenate">
                        {{ $all_categories->links('pagination::simple-tailwind', ['class' => 'pagination']) }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
