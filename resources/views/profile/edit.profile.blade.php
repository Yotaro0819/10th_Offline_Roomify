@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <form action="#" method="post">
            @crsf
            @method('PATCH')
            <div class="mb-3">
                <label for="text">User Name</label>
                <input type="text">
            </div>
            <div class="mb-3">
                <label for="text">About Me</label>
                <input type="text">
            </div>
        </form>
    </div>
</div>