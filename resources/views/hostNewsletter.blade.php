@extends('layouts.app')

@section('title', 'Host Newsletters')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2>News Letter Page</h2>
        </div>
        <div class="col">
            <div class="btn">
                Writte a newsletter
            </div>
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