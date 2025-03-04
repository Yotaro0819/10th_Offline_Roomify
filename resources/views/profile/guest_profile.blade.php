@extends('layouts.app')

@section('content')
@php
  use Illuminate\Support\Str;
@endphp
<style>
  body{
    background: #004aad;
  }

  .card{
    background: #fff;
    padding: 60px;
    border-radius: 20px;
    height: 750px;
    width: 1200px;
    margin: 100px 50px;
  }

  .profile-container{
    display: flex;
    margin-bottom: 10px;
  }

  .profile-edit{
    margin-left: auto;
    color: gray;
    border-radius: none;
  }

  .profile-img{
    width: 230px;
    height: 230px;
    border-radius: 50%;
    object-fit: cover;
    margin-left: 100px;
    margin-top: -10px;
  }

  .profile-icon{
    font-size: 170px;
    color: gray;
  }

  .name{
    width: 500px;
    margin-left: 150px;
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
    margin-top: 5px;
  }

  .line{
    width: 100px;
  }

  .stars {
    display: flex;
    gap: 5px; /* 星同士の間隔 */
    margin-top: -10px;
    justify-content: flex-start;
    margin-left: -15px;
  }

</style>
<script>
document.getElementById('avatarInput').addEventListener('change', function(event) {
    let reader = new FileReader();
    reader.onload = function() {
        let avatarPreview = document.getElementById('avatarPreview');
        avatarPreview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});
</script>

<body>
<div class="container">
    <div class="card">
      <div class="profile-container">
        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn profile-edit">
          <i class="fa-solid fa-user-pen" style="font-size: 30px;"></i>
        </a>
      </div>
        <div class="row">
            <div class="col-4 d-flex justify-content-start align-items-center text-left" id="icon">
                <!-- avatar -->
                <form action="{{ route('profile.updateAvatar', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto d-flex justify-content-start align-items-center text-left" id="icon">
                        @if($user->avatar)
                          <img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img" id="avatarPreview">
                        @else
                          <i class="fa-solid fa-circle-user nav-icon" style="font-size: 180px; margin-left: 100px;"></i>
                        @endif
                    </div>

                    <div class="d-flex justify-content-start">
                      <div class="ms-4">
                          <input type="file" name="avatar" id="avatarInput" class="form-control mt-4">
                          <button type="submit" class="btn btn-outline mt-2">Change Icon</button>
                      </div>
                  </div>
                </form>
            </div>
            <div class="col-8">
              <div class="content-container w-100 mt-3">
                <div class="name mt-3">
                      <h4>{{ $user->name }}</h4>
                      <hr>
                </div>
                <div class="name mt-5" >
                      <h4>{{ $user->nationality->nationality ?? 'Not available' }}</h4>
                      <hr>
                </div>
                <div class="name mt-5">
                      <h4 class="mb-1">About Me</h4>
                      <p>
                          {{ $user->about_me ?? "I'm from " . ($user->nationality->nationality ?? 'a beautiful country') . ". I enjoy meeting new people and sharing my culture with others." }}
                      </p>
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
                @forelse($reviews->take(3) as $review)
                    <div class="card col-auto review">
                        <!-- star -->
                        <h5 class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->star)
                                    <i class="fa-solid fa-star text-warning"></i> <!-- 塗りつぶしの星 -->
                                @else
                                    <i class="fa-regular fa-star text-secondary"></i> <!-- 空の星 -->
                                @endif
                            @endfor
                        </h5>

                        <p class="truncate-text">{{ Str::limit($review->comment, 10.5, '...') }}</p>

                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- icon -->
                                @if($review->user->avatar)
                                    <img src="{{ asset('storage/' . $review->user->avatar) }}" alt="Reviewer Avatar" class="rounded-circle" style="width: 40px; height: 40px;">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary fa-2x"></i>
                                @endif
                            </div>
                            <div class="col-auto d-flex flex-column justify-content-center">
                                <h6 class="mb-1">{{ $review->user->name }}</h6>
                                <small class="text-muted">{{ $review->created_at->format('Y-m-d') }}</small>
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
