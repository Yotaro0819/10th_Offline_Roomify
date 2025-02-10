@extends('layouts.app')

@section('title', 'show')

<link rel="stylesheet" href="{{ asset('css/accommodationShow/slidePanel.css') }}">
<link rel="stylesheet" href="{{ asset('css/accommodationShow/accommodationShow.css') }}">
<link rel="stylesheet" href="{{ asset('css/accommodationShow/star.css') }}">
<script src="{{ asset('js/slidePanel.js') }}"></script>
<script src="{{ asset('js/star.js') }}"></script>

<script>

    // Google Maps APIスクリプトを動的に読み込む関数
    function loadGoogleMapsScript() {
        const apiKey = "{{ config('services.google_maps.api_key') }}";
        const timestamp = new Date().getTime();  // キャッシュバスター（URLにタイムスタンプを追加）

        // Google Mapsのスクリプトを作成
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap&libraries=places&v=${timestamp}`;
        script.async = true;
        script.defer = true;

        // スクリプトをHTMLに追加
        document.head.appendChild(script);
    }

    // Google Mapsを初期化する関数
    function initMap() {
        console.log('Google Maps initialized!');
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: {{ $accommodation->latitude }}, lng: {{ $accommodation->longitude }} },
        });

        var marker = new google.maps.Marker({
            position: { lat: {{ $accommodation->latitude }}, lng: {{ $accommodation->longitude }} },
            map: map,
        });
    }

    // ページ遷移後（routeで戻ったときなど）に地図を再初期化するためにスクリプトを読み込む
    document.addEventListener('turbo:load', function() {
        loadGoogleMapsScript();  // Google Maps APIスクリプトを再読み込み
    });

    // 初期ロード時にもスクリプトを読み込む
    loadGoogleMapsScript();

</script>
@section('content')

<div class="container w-75 mx-auto">


    <div class="picture-box">
        <div class="left">

            <a href="{{ route('accommodation.pictures', $accommodation->id) }}"><img src="{{ asset('storage/'. $accommodation->photos[0]->image) }}" alt="pic1" class="rounded-4"></a>
        </div>
        <div class="center">
            <a href="{{ route('accommodation.pictures', $accommodation->id) }}"><img src="{{ asset('storage/'. $accommodation->photos[1]->image) }}" alt="pic2" class="rounded-4 "></a>
            <a href="{{ route('accommodation.pictures', $accommodation->id) }}"><img src="{{ asset('storage/'. $accommodation->photos[2]->image) }}" alt="pic3" class="rounded-4 "></a>
        </div>
        <div class="right">
            <a href="{{ route('accommodation.pictures', $accommodation->id) }}"><img src="{{ asset('storage/'. $accommodation->photos[3]->image) }}" alt="pic4" class="rounded-4"></a>
        </div>
    </div>

    <div class="price">
        <h2 class="fs-1">¥{{ $accommodation->price}}/day</h2>
    </div>

    <div class="categories mb-3">
        @foreach ($accommodation->categories as $category)
        <span class="bg-gray-500 text-secondary p-1 rounded me-4">{{$category->category_name}}</span>
        @endforeach
    </div>


    <div class="hashtag">
        @foreach ($accommodation->hashtags as $hashtag)
        <a href="{{route('accommodation.hashtag', ['name' => $hashtag->name, 'cityName' => $accommodation->city])}}" class="me-4 text-primary">#{{$hashtag->name}}</a>
        @endforeach
    </div>

    <div class="w-50 mx-auto">
        @if (Auth::check())
        <a href="{{route('guest.booking.create', $accommodation->id)}}" class="booking-btn text-black fs-4 p-2 mx-auto d-block text-center rounded-3 my-3 shadow">Go to the Booking Page</a>
        @else
       <a href="{{ route('login') }}?redirect={{ route('accommodation.show', $accommodation->id) }}" class="login-btn text-black fs-4 p-2 mx-auto d-block text-center rounded-3 my-3 shadow">Go Login/Register</a>
        @endif
    </div>

    <div class="description-section">
        <h2 class="title fs-2 mt-4">{{ $accommodation->name}}</h2>
        <p class="fs-5 mb-0">Description</p>
        <p class="fs-5">{{ $accommodation->description }}</p>
    </div>

    <div class="d-flex">
        <div class="border-black border-top border-bottom w-50 m-4">
            <h2 class="ms-2">Host Info</h2>
            <div class="d-flex">
                <a href="{{ route('profile.show', $accommodation->user->id)}}" class="d-flex align-items-center">
                    {{-- this a tag can go message page --}}
                @if ($accommodation->user->avatar)
                <img src="{{ asset('storage/' . $accommodation->user->avatar) }}" alt="" class="rounded">
                @else
                    <i class="fa-solid fa-user m-3" style="font-size:40px"></i>
                @endif
                <div class="d-flex flex-column justify-content-center">
                    <p class="ms-4 fs-5 text-black">{{ $accommodation->user->name}}</p>
                    <p class="ms-4 fs-5 text-black m-0">{{$accommodation->user->nationality->nationality}}</p>
                </div>
                </a>
            </div>
            <p class="w-50 mx-auto text-center"><a href="{{ route('messages.show', $accommodation->user->id)}}" class="btn border-black shadow">Send Message</a></p>

        </div>
        <div class="border-black border rounded w-50 m-4 sidePanel" id="openButton">

            <div id="sidePanel" class="hidden">

                <div id="closeButton" class="close-icon hidden"><i class="fas fa-angle-right angle"></i></div>
                <h2 class="text-center">Comments</h2>

                <div class="mt-5 mx-5 comments">
                <p class="text-secondary">Latest review</p>

                    @forelse ($reviews as $review)
                    <div class="border rounded my-4 p-3">
                    <a href="/profile">
                        <p class="text-start m-0 fs-5">{{ $review->user->name}}</p>
                        <p class="m-0 mb-2 text-secondary">{{$review->user->reviews->count()}} reviews</p>
                    </a>
                    <p class="m-0">
                        {{-- stars --}}
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->star)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                        <span class="text-secondary">{{ $review->created_at}}</span>
                    </p>
                    <p class="m-0 review-text">
                        {{-- comments(read more) --}}
                        {{ Str::limit($review->comment, 90) }}
                        @if (strlen($review->comment) > 90)
                            <a href="javascript:void(0);" class="read-more text-primary" data-full="{{ $review->comment }}">Read more</a>
                        @endif
                    </p>
                        <p class="text-end mb-0">{{$review->created_at}}</p>
                    </div>

                    @empty
                        <h2>No reviews yet.</h2>
                    @endforelse
                </div>
                <button class="button-review text-center" style="margin-left: 170px;" data-bs-toggle="modal" data-bs-target="#review-accommodation-{{ $accommodation->id }}">Post Review</button>
            </div>

            <div class="d-flex align-items-center">

                {{-- this a tag can go review.index --}}
                <p class="fs-1 d-flex align-items-center text-black mb-0"><i class="fas fa-star text-warning me-2"></i> {{ round($average,1) }}<span class="fs-5">({{$accommodation->reviews->count() }} reviews)</span></p>
            </div>

            <div class="recent-review">

                @if ($latest_review)
                <img src="{{ asset('assets/istockphoto-1300845620-612x612.jpg') }}" alt="User icon" class="mb-0" style="width: 30px">

                {{ Str::limit($latest_review->comment, 220) }}

                @if (strlen($latest_review->comment) > 220)
                    <a href="javascript:void(0);" class="read-more text-primary" data-full="{{ $latest_review->comment }}">Read more</a>
                @endif

                <p class="text-end me-4 mb-1">{{ $latest_review->created_at }}</p>
            @else
                <p>No reviews yet.</p>
            @endif

            </div>
        </div>
    </div>

    <div class="coupon-section bg-yellow border-black border text-center rounded-3 w-25 mx-auto">
        <p class="m-0 fw-bold">Accommodation Rank: {{ $accommodation->rank }}</p>
        <h3 class="fs-4">Get coupon</h3>
        <h3 class="fw-bold">10% OFF Coupon</h3>
    </div>

    <div class="google-location w-50 mx-auto mb-5" >
        <h3 class="fs-4">Location</h3>
        <div id="map" style="height: 250px; width: 100%; margin: auto"></div>
    </div>
</div>

@include('accommodation.modal.show')
@endsection


