@extends('layouts.app')

@section('content')
<style>
  body{
    background: #004aad;
  }

  .card{
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    height: 550px;
    width: 1200px;
    margin: 100px 50px;
  }

  .img{
    border-radius: 50%;
  }

  h4{
    color: #666;
  }

  .right-align{
    margin-left: 350px;
    margin-top: 50px;
  }

  .row .info{
    margin: 10px;
    display: flex;
    gap: 70px;
  }

  .reviews{
    text-align: left;
    margin-top: -10px;
  }

  .review{
    width: 210px;
    height: 210px;
    margin-top: -20px;
  }
  
  .line{
    width: 100px;
  }

  .name{
    margin-top: -30px;
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
                <h4>Name</h4>
                <hr>
                <div class="row info">
                    <div class="col-auto">
                        <h4>Launguage</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4>My place of location</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4>Hobby</h4>
                        <hr>
                    </div>
                </div>
                <!-- If the user is host -->
                <div class="row info">
                    <div class="col-auto">
                        <h4><i class="fa-solid fa-star"></i>Star</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4>Hosting experience</h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="reviews">
                <h4>Reviews</h4>
                <hr class="line">
            </div>
            <div class="card col-auto review">
                <!-- star -->
                <h5>
                    <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                </h5>
                <h5>Review Title</h5>
                <p>Review body</p>
                <div class="row">
                    <div class="col-auto">
                        <!-- icon -->
                        <img src="" alt="">
                    </div>
                    <div class="col-auto name">
                        <h6>Reviewer name</h6>
                        <small>Date</small>
                    </div>
                </div>
            </div>
            <div class="card col-auto review">
                <!-- star -->
                <h5>
                    <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                </h5>
                <h5>Review Title</h5>
                <p>Review body</p>
                <div class="row">
                    <div class="col-auto">
                        <!-- icon -->
                        <img src="" alt="">
                    </div>
                    <div class="col-auto name">
                        <h6>Reviewer name</h6>
                        <small>Date</small>
                    </div>
                </div>
            </div>
            <div class="card col-auto review">
                <!-- star -->
                <h5>
                    <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                </h5>
                <h5>Review Title</h5>
                <p>Review body</p>
                <div class="row">
                    <div class="col-auto">
                        <!-- icon -->
                        <img src="" alt="">
                    </div>
                    <div class="col-auto name">
                        <h6>Reviewer name</h6>
                        <small>Date</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
@endsection