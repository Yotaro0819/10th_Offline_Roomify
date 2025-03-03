@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <form action="#" method="post">
            @crsf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">User Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="about_me" class="form-label fw-bold">About Me</label>
                <input type="textarea" name="about_me">
            </div>

            <button type="submit" class="btn px-5">Update Your infomation</button>
        </form>
    </div>
</div>