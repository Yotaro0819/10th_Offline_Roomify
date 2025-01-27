@extends('layouts.app')

@section('title', 'pictures')

@section('content')

<div class="container w-75 mx-auto">
    <h2 class="h1 my-5">Photos</h2>
    <a href="#" class="text-black"><i class="fa-solid fa-angles-left"></i> Back to the accommodation page</a>

    <div class="row mt-5">
        <!-- 写真1 -->
        <div class="col-6">
          <img src="{{ asset('asset_Araki/chintai-14-670x448.jpg')}}" alt="Image 1" class="img-fluid rounded-5 mb-3">
        </div>
        <!-- 写真2 -->
        <div class="col-6">
          <img src="{{ asset('asset_Araki/DSC08197-670x448.jpg')}}" alt="Image 2" class="img-fluid rounded-5 mb-3">
        </div>
        <!-- 写真3 -->
        <div class="col-6">
          <img src="{{ asset('asset_Araki/DSC08197-670x448.jpg')}}" alt="Image 3" class="img-fluid rounded-5 mb-3">
        </div>
        <!-- 写真4 -->
        <div class="col-6">
          <img src="{{ asset('asset_Araki/DSC08197-670x448.jpg')}}" alt="Image 4" class="img-fluid rounded-5 mb-3">
        </div>

        <div class="col-6">
            <img src="{{ asset('asset_Araki/DSC08197-670x448.jpg')}}" alt="Image 5" class="img-fluid rounded-5 mb-3">
          </div>
      </div>
    </div>
</div>



@endsection
