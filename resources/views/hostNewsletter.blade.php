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

    .table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
    }
</style>

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>News Letter Page</h2>
        </div>
        <div class="col text-end">
            <a href="{{ url('/create/newsletter') }}" class="btn">
                <i class="fa-solid fa-pencil"></i> Write a new newsletter
            </a>
        </div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsletters as $newsletter)
            <tr>
                <td>{{ $newsletter->created_at->format('Y-m-d') }}</td>
                <td>{{ $newsletter->title }}</td>
                <td>{{ $newsletter->message }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
