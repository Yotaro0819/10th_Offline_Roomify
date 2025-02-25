@extends('layouts.app')

@section('title', 'Host Newsletters')

@section('content')
<style>
    .table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // すべてのニュースレター行にクリックイベントを追加
        document.querySelectorAll('.newsletter-row').forEach(function(row) {
            row.addEventListener('click', function() {
                let date = this.dataset.date;
                let title = this.dataset.title;
                let message = this.dataset.message;

                // モーダル内の要素にデータをセット
                document.getElementById('modalDate').textContent = date;
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalMessage').textContent = message;

                // モーダルを表示
                let modal = new bootstrap.Modal(document.getElementById('newsletterModal'));
                modal.show();
            });
        });
    });
</script>


<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>News Letter Page</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('newsletter.create') }}">
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
            <tr class="newsletter-row"
                        data-date="{{ $newsletter->created_at->format('Y-m-d') }}"
                        data-title="{{ $newsletter->title }}"
                        data-message="{{ $newsletter->message }}">
                <td>{{ $newsletter->created_at->format('Y-m-d') }}</td>
                <td>{{ $newsletter->title }}</td>
                <td>{{ $newsletter->message }}</td>
            </tr>
            @endforeach
            @include('newsletter.modal.status')
        </tbody>
    </table>
</div>

@endsection
