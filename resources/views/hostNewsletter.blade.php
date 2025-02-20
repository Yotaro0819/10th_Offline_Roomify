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
            <tr data-bs-toggle="modal" data-bs-target="#newsletterModal{{ $newsletter->id }}" style="cursor: pointer;">
                <td>{{ $newsletter->created_at->format('Y-m-d') }}</td>
                <td>{{ Str::limit($newsletter->title, 30) }}</td>
                <td>{{ Str::limit($newsletter->message, 50) }}</td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="newsletterModal{{ $newsletter->id }}" tabindex="-1" aria-labelledby="newsletterModalLabel{{ $newsletter->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newsletterModalLabel{{ $newsletter->id }}">{{ $newsletter->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $newsletter->message }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (必要に応じて追加) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

@endsection
