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
                <th>User Id</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($requests as $request)
            <tr>
                <td>{{ $request->user_id }}</td>
                <td>{{ $request->message }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <form action="{{ route('admin.hostRequest.approve', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.hostRequest.reject', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger">Reject</button>
                    </form>
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
