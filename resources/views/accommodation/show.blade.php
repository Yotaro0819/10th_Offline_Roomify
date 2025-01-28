@extends('layouts.app')

@section('title', 'show')

<style>
    .w-10 {
        width: 10%;
    }
    .w-20 {
        width: 20%;
    }
    .w-85 {
        width:85%;
    }

    .picture-box {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* 上揃え */
            /* height: 100vh; */
        }


        .center {
            width: 31%;
            height: 50%;
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            /* align-items: center; */
        }
        .left {
            width: 45%;
        }

        .right {
            width: 20%;
        }

        .left img {
            width: 100%;
            height: 390px;

        }

        .right img {
            width: 100%;
            height: 390px;
        }

        .center img {
            width: 100%;
            margin-bottom:10px;
            height: 190px;
            border-radius: 10px;
        }

        img {
            object-fit:cover;
        }

        .bg-gray-500 {
            background-color:rgb(223, 223, 223);
        }

        .bg-yellow {
            background-color: yellow;
        }

        .booking-btn {
            background-color: #DCBF7D;
        }


</style>

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

<div class="container w-75 mx-auto ">
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
        <a href="{{route('booking.create', $accommodation->id)}}" class="booking-btn text-black fs-4 p-2 mx-auto d-block text-center rounded-3 my-3 shadow">Go to the Booking Page</a>
        @else
        <a href="{{route('login')}}" class="booking-btn text-black fs-4 p-2 mx-auto d-block text-center rounded-3 my-3 shadow">Go Login/Register</a>
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
                <a href="#" class="d-flex align-items-center">
                    {{-- this a tag can go message page --}}
                @if ($accommodation->user->avatar)
                <img src="{{ asset('storage/' . $accommodation->user->avatar) }}" alt="">
                @else
                <img src="{{ asset('assets/istockphoto-1300845620-612x612.jpg') }}" alt="User icon" class="w-20 my-2">
                @endif
                <div class="d-flex flex-column justify-content-center">
                    <p class="ms-4 fs-5 text-black">{{ $accommodation->user->name}}</p>
                    <p class="ms-4 fs-5 text-black">{{$accommodation->user->nationality->nationality}}</p>
                </div>
                </a>
            </div>

        </div>
        <div class="border-black border rounded w-50 m-4">
            <a href="#" class="d-flex align-items-center">
                {{-- this a tag can go review.index --}}
                <p class="fs-1 d-flex align-items-center text-black mb-0"><img src="{{ asset('assets/240_F_540091788_AvDyNUSbtnKQfNccukuFa3ZlsHFnMYrK.jpg') }}" alt="star" class="w-10 m-1">4.8 <span class="fs-4">(5 reviews)</span></p>
            </a>

            <p class="ms-4 fs-5 mb-0">Recent reviews</p>

            <div class="recent-review">

                <div class=" d-flex">
                    <img src="{{ asset('assets/istockphoto-1300845620-612x612.jpg') }}" alt="User icon" class="w-10 ms-4">
                    <p class="d-flex align-items-center fs-5 mb-0">This place was really nice and ...</p>
                </div>
                    <p class="text-end me-4 mb-1">yyyy/mm/dd</p>
            </div>
        </div>
    </div>

    <div class="coupon-section bg-yellow border-black border text-center rounded-3 w-25 mx-auto">
        <h3 class="fs-4">Get coupon</h3>
        <h3 class="fw-bold">10% OFF Coupon</h3>
    </div>

    <div class="google-location w-50 mx-auto mb-5" >
        <h3 class="fs-4">Location</h3>
        <div id="map" style="height: 250px; width: 100%; margin: auto"></div>
    </div>
</div>



@endsection
