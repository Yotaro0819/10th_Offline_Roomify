@extends('layouts.app')

@section('title', 'hashtag accommodation')

<style>
.card-title, .card-text {
    text-align: left !important;
  }
</style>
@section('content')

<div class="container w-75 vh-100">
    <h2 class="fs-5 mb-0 mt-5">Hashtag: big_bathroom</h2>
    <a href="#" class="text-black d-block mt-5"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    <div class="container mt-4">
        <div class="row">
          <div class="col-12 col-md-4 mb-4">
            <div class="card" style="height:450px;">
              <img src="{{ asset('asset_Araki/DSC049641000-670x448.jpg')}}" class="card-img-top" alt="Card image 1" style="height: 320px;">
              <div class="card-body">
                <h5 class="card-title">Card 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <div class="card" style="height:450px;">
              <img src="{{ asset('asset_Araki/DSC08197-670x448.jpg')}}" class="card-img-top" alt="Card image 2" style="height: 320px;">
              <div class="card-body">
                <h5 class="card-title">Card 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <div class="card" style="height:450px;">
              <img src="{{ asset('asset_Araki/DSC09324_w900-670x448.jpg')}}" class="card-img-top" alt="Card image 3" style="height: 320px;">
              <div class="card-body">
                <h5 class="card-title">Card 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>


</div>
@endsection
