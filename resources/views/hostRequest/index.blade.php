@extends('layouts.app')
<style>
    main {
        min-height:54%;
    }
    .border-none {
        border:none;
    }
</style>
@section('content2')
<div class="container">
    <h2>Host Request index page</h2>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($requests as $request)
            <tr>
                <td>{{ $request->user->name }}</td>
                <td>{{ $request->message }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <form action="{{ route('admin.hostRequest.approve', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success">Approve</button>
                    </form>

                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject-request-{{ $request->id }}">
                        Reject
                    </button>
                    @include('hostRequest.modal.reject')

                </td>
            </tr>
            @empty
            <tr>
                <td class="border-none fw-bold">No requests</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
