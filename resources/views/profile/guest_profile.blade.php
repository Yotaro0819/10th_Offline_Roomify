@extends('layouts.app')

@section('content')
<style>
  body{
    background: #004aad;
  }

  .card{
    background: #fff;
    padding: 60px;
    border-radius: 20px;
    height: 600px;
    width: 1200px;
    margin: 100px 50px;
  }

  .profile-img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
  }

  .profile-icon{
    font-size: 170px;
    color: gray;
  }

  .name{
    width: 400px;
    margin-left: 180px;
  }

  h4{
    color: #666;
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
        <div class="row">
            <div class="col-auto d-flex justify-content-start align-items-center text-left" id="icon">
                <!-- avatar -->
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img">
                @else
                    <i class="fa-solid fa-circle-user text-secondary profile-icon"></i>
                @endif
            </div>
            <div class="col-auto">
                <div class="name mt-3">
                    <h4>{{ Auth::user()->name }}</h4>
                    <hr>
                </div>
                <div class="row info align-items-center mt-5">
                    <div class="col-auto mt-4" style="position: relative; left: 50px;">
                        <h4>{{ Auth::user()->nationality->nationality ?? 'Not available' }}</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4 class="mb-1">About Me</h4>
                        <p>I'm from {{ Auth::user()->nationality->nationality ?? 'a beautiful country' }}. I enjoy meeting new people and sharing my culture with others.</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="reviews mt-4">
                <h4>Reviews</h4>
                <hr class="line">
            </div>
                @forelse($user->receivedReviews as $review)
                    <div class="card col-auto review">
                        <!-- star -->
                        <h5>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-regular fa-star @if($i <= $review->star) text-warning @else text-secondary @endif"></i>
                            @endfor
                        </h5>
                        <p>{{ $review->comment }}</p>
                        <div class="row">
                            <div class="col-auto">
                                <!-- icon -->
                                @if($review->user->avatar)
                                    <img src="{{ asset('storage/' . $review->user->avatar) }}" alt="Reviewer Avatar" width="30" height="30" class="rounded-circle">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary"></i>
                                @endif
                            </div>
                            <div class="col-auto name">
                                <h6>{{ $review->user->name }}</h6>
                                <small>{{ $review->created_at->format('Y-m-d') }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No reviews yet.</p>
                @endforelse
        </div>

    </div>
</div>
</body>
@endsection