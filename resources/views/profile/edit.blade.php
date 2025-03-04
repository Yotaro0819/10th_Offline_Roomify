@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card pt-3 pb-3 shadow-sm" style="width: 700px; border: 10px solid #bbb">
        <h2 class="mt-3 text-center fw-bold">Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="alert alert-danger mx-auto" 
                style="max-width: 600px; !important widht: 100%; padding: 6px 12px; line-height: 1.4; max-height: 120px; margin-top: 10px;">
                    <div class="mb-0">
                        @foreach ($errors->all() as $error)
                        <p><i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <div class="mt-3 d-flex align-items-center">
                    <label for="name" class="form-label fw-bold me-3" style="width: 120px;">User Name</label>
                    <input type="text" name="name" class="form-control ms-auto me-3" 
                        style="width: 400px;" value="{{ old('name', auth()->user()->name) }}" maxlength="20">
                </div>
                <small class="text-muted ms-5">* You can enter up to 20 characters</small>
            </div>

            <div class="mb-3">
                <div class="mt-3 d-flex align-items-center">
                    <label for="about_me" class="form-label fw-bold me-3" style="width: 120px;">About Me</label>
                    <textarea name="about_me" class="form-control ms-auto me-3" style="width: 400px; height: 100px;" maxleght="120">{{ old('about_me', $user->about_me) }}</textarea>
                </div>
                <small class="text-muted ms-5">* You can enter up to 120 characters</small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-secondary px-4">Update</button>
                <a href="{{ route('profile.show', auth()->user()->id) }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
