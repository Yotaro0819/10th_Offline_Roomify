@extends('layouts.app')

@section('title', 'pictures')

<style>
    .images {
        width: 500px;
        object-fit:cover;
    }
</style>
@section('content')

<div class="container w-75 mx-auto">
    <h2 class="h1 my-5">Photos</h2>
    <a href="{{ route('accommodation.show', $accommodation->id)}}" class="text-black"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    <div class="row mt-5">

        @foreach ($accommodation->photos as $photo)
        <div class="col-6">
            <img src="{{ asset('storage/'. $photo->image)}}" alt="Images" class="img-fluid rounded-5 mb-3 images" style="height:400px;">
          </div>
        @endforeach

      </div>
    </div>
</div>

@endsection
