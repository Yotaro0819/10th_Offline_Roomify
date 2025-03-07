@extends('layouts.app')

@section('title', 'Admin: message')

@section('content2')

<div class="container">
    <h3 class="title">Contact Messages</h3>
    @if($all_contacts->isNotEmpty())
    @foreach( $all_contacts as $contact )
    <a href="{{ route('admin.contact.show', $contact->id) }}" class="text-decoration-none text-dark">
    <div class="card">
    <div class="card-body p-0">
            <div class="row align-items-center border-bottom p-2">
                <div class="col text-center">
                    @if($contact->is_replied)
                        <div>
                        <i class="fa-solid fa-circle-check display-5"></i>
                        <p class="mb-0">Replied</p>
                        </div>
                    @elseif($contact->is_read)
                        <i class="fa-solid fa-envelope-open text-secondary display-4"></i> 
                    @else
                        <i class="fa-solid fa-envelope text-primary display-4"></i> 
                    @endif
                </div>
                <div class="col text-start">
                    <div class="">From: {{ $contact->name }}</div>
                    <div class="">Email: {{ $contact->email }}</div>
                    <div class="">Message: {{ Str::limit($contact->message, 10, '...') }}</div>
                </div>
                <div class="col">
                    <div>{{ $contact->created_at->diffForHumans() }}</div>
                    <div>{{ $contact->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
        <div class="text-center pagenate mt-3">
        {{ $all_contacts->links('pagination::simple-tailwind', ['class' => 'pagination']) }}
        </div>
    @else
    <div class="">No message</dive>
    @endif
    </div>
</div>

@endsection