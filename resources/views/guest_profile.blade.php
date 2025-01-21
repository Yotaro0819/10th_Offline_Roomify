@extends('layouts.app')

@section('content')
<style>
  body{
    background: #004aad;
  }

  .card{
    background: #fff;
    padding: 40px;
    margin: 10px 5px;
    border-radius: 20px;
  }

  .right-align{
    margin-left: 350px;
    margin-top: 50px;
  }

  .info{
    margin: 10px;
  }

  .reviews{
    text-align: left;
  }

  .review{
    width: 240px;
    height: 240px;
  }
  
  .line{
    width: 100px;
  }
</style>
<body>
<div class="container">
    <div class="card">
        <div class="row right-align">
            <div class="col-auto">
                <img src="" alt="">
            </div>
            <div class="col-auto">
                <h3>Name</h3>
                <hr>
                <div class="row info">
                    <div class="col-auto">
                        <h3>Launguage</h3>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h3>My place of location</h3>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h3>Hobby</h3>
                        <hr>
                    </div>
                </div>
                <!-- If the user is host -->
                <div class="row info">
                    <div class="col-auto">
                        <h3><i class="fa-solid fa-star"></i>Star</h3>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h3>Hosting experience</h3>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="reviews">Reviews</h3>
        <hr class="line">
        <div class="card review">
            <!-- star -->
            <h3>
                <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
            </h3>
            <h3>Review Title</h3>
            <p>Review body</p>
            <div class="row">
                <div class="col-auto">
                    <!-- icon -->
                    <img src="" alt="">
                </div>
                <div class="col-auto">
                    <h5>Reviewer name</h5>
                    <small>Date</small>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
@endsection