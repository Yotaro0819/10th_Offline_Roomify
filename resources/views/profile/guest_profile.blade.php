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

  .profile-img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
  }

  .profile-icon{
    font-size: 150px;
    color: gray;
  }

  #{
    text-align: left;
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
        <div class="row">
            <div class="col-4 d-flex justify-content-start align-items-center" id="icon">
                <!-- avatar -->
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img">
                @else
                    <i class="fa-solid fa-circle-user text-secondary profile-icon"></i>
                @endif
            </div>
            <div class="col-auto">
                <h4>{{ Auth::user()->name }}</h4>
                <hr>
                <div class="row info">
                    <div class="col-auto">
                        <h4>{{ Auth::user()->nationality->nationality ?? 'Not available' }}</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                    <h4>About Me</h4>
                    <p>I'm from {{ Auth::user()->nationality->nationality ?? 'a beautiful country' }}. I enjoy meeting new people and sharing my culture with others.</p>
                        <!-- <h4>My place of location</h4>
                        <hr> -->
                    </div>
                    <!-- <div class="col-auto">
                        <h4>Hobby</h4>
                        <hr>
                    </div> -->
                </div>
                <!-- If the user is host
                <div class="row info">
                    <div class="col-auto">
                        <h4><i class="fa-solid fa-star"></i>Star</h4>
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4>Hosting experience</h4>
                        <hr>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="row">
            <div class="reviews">
                <h4>Reviews</h4>
                <hr class="line">
            </div>
                @forelse($reviews as $review)
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