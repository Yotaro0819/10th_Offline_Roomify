@extends('layouts.app')
<style>
    main {
        min-height:54%;
    }
</style>
@section('content')
<div class="container">
    <h2>Host Request index page</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ユーザーID</th>
                <th>メッセージ</th>
                <th>ステータス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
            <tr>
                <td>{{ $request->user_id }}</td>
                <td>{{ $request->message }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <form action="{{ route('admin.hostRequest.approve', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.hostRequest.reject', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
