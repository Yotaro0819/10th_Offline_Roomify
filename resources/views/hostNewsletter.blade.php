@extends('layouts.app')

@section('title', 'Host Newsletters')

@section('content')

<style>
    .btn{
        background-color: #004aad;
        color: white;
    }

    .btn:hover {
        background-color: #2980b9;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>News Letter Page</h2>
        </div>
        <div class="col">
            <a href="{{ url('/create/newsletter') }}" class="btn">
                <i class="fa-solid fa-pencil"></i> Write a new newsletter
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

@endsection