@extends('layouts.app')

@section('title', 'hashtag accommodation')

<style>
.card-title, .card-text {
    text-align: left;
  }
.img {
    object-fit: cover;
}
.truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 300px;
    font-size:12px;
}
</style>
@section('content')

<div class="container w-75">
    <a href="{{ url()->previous() }}" class="text-black d-block mt-5"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    <h2 class="fs-5 mb-0 mt-5">Hashtag: <span class="fw-bold">{{$hashtag->name}}</span></h2>
    <h2 class="fs-5 mb-0 mt-1">City: <span class="fw-bold">{{ $city }}</span></h2>



    <div class="container mt-4">
        <div class="row justify-content-start">

    @forelse ($all_accommodations as $accommodation)
    <div class="col-12 col-md-4 mb-4">
        <a href="{{ route('accommodation.show', $accommodation->id)}}">
        <div class="card" style="height:450px;">
            @if($accommodation->photos->isNotEmpty())
                <img src="{{ asset('storage/'. $accommodation->photos[0]->image) }}" class="card-img-top" alt="Card image 1" style="height: 320px;">
            @else
                <img src="#" alt="">
            @endif
          <div class="card-body">
            <h5 class="card-title">{{ $accommodation->name }}</h5>
            <p class="fs-5 text-start">¥{{ $accommodation->price }}</p>
            <p class="truncate">{{ $accommodation->address }}</p>
          </div>
        </div>
        </a>
      </div>
    @empty
    <div>
        <h3>No Accommodations here.</h3>
    </div>
    @endforelse
</div>

</div>
@endsection
