@extends('layouts.app')

@section('title', 'Admin: Message')

@section('content2')

<style>

.card {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-left: 5px solid #d4af37;
}
.card-header {
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    color: #8b4513;
    margin-bottom: 10px;
}
.card-body {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 15px;
}
.card-footer {
    text-align: right;
    font-style: italic;
    color: #555;
    font-size: 0.9rem;
}
.btn {
    display: block;
    width: fit-content;
    margin: 20px auto 0;
}

</style>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@include('admin.contact.modal.status')
    <div class="card">
        <div class="card-head text-start border-bottom">
            <p><strong>From:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong>
            <a href="#" data-bs-toggle="modal" data-bs-target="#email{{ $contact->id }}" class="text-primary border-bottom border-primary text-decoration-none">
                {{ $contact->email }}
            </a>
            </p>
        </div>
        <div class="card-body text-start">
            <p>{{ $contact->message }}</p>
        </div>
        <div class="card-footer">Received: {{ $contact->created_at->format('Y-m-d H:i') }}</div>
    </div>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-dark">Back to Inbox</a>

@endsection
