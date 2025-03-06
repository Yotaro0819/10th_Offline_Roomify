@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content2')

<style>

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
<h3>
    Categories
</h3>
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

@endsection
