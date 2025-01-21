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

    .rounded-5 {
        border-radius: 5%;
    }

    .picture-box {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* 上揃え */
            /* height: 100vh; */
        }

        .left {
            width: 50%;
        }
        .right {
            width: 20%;
            height: 430px;
        }

        .center {
            width: 30%;
            /* height: 50%; */
            display: flex;
            flex-direction: column; /* 縦に並べる */
            justify-content: center;
            align-items: center;
        }

        .center img {
            margin-bottom: 15px; /* 上下の画像間隔 */
        }

        .left img, .right img {
            width: 100%;
            border-radius: 10px; /* 角を丸くする */
        }

        .center img {
            width: 80%; /* 中央の画像の幅を少し小さく */
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

@section('content')

<div class="container w-85 mx-auto">
    <div class="picture-box">
        <div class="left">
            <a href="#"><img src="{{ asset('asset_Araki/chintai-14-670x448.jpg') }}" alt="pic1" class="rounded-5"></a>
        </div>
        <div class="center">
            <a href="#"><img src="{{ asset('asset_Araki/DSC09324_w900-670x448.jpg') }}" alt="pic2" class="rounded-5 h-50 d-block mx-auto"></a>
            <a href="#"><img src="{{ asset('asset_Araki/DSC08197-670x448.jpg') }}" alt="pic3" class="rounded-5 h-50 d-block mx-auto"></a>
        </div>
        <div class="right">
            <a href="#"><img src="{{ asset('asset_Araki/DSC049641000-670x448.jpg') }}" alt="pic4" class="rounded-5 h-100"></a>
        </div>
    </div>

    <div class="price">
        <h2 class="fs-1">¥10,000/day</h2>
    </div>

    <div class="categories mb-3">
        <span class="bg-gray-500 text-secondary p-1 rounded me-4">category</span>
        <span class="bg-gray-500 text-secondary p-1 rounded me-4">category</span>
        <span class="bg-gray-500 text-secondary p-1 rounded me-4">category</span>
    </div>
    <div class="hashtag">
        <a href="" class="me-4">#hashtag</a>
        <a href="" class="me-4">#hashtag</a>
        <a href="" class="me-4">#hashtag</a>
    </div>

    <div class="w-50 mx-auto">
        <a href="#" class="booking-btn text-black fs-1 p-2 mx-auto d-block text-center rounded-5">Go to the Booking Page!</a>
    </div>

    <div class="description-section">
        <h2 class="title fs-1 mt-4">Name of the accommodation</h2>
        <p class="fs-2 mb-0">Description</p>
        <p class="fs-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aspernatur quidem, tempore voluptate culpa asperiores voluptates dolores itaque reiciendis nostrum porro excepturi, alias, eum labore dolorem facilis. In, ut quasi. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet, explicabo. Ab quaerat ratione, voluptas molestias aut, exercitationem officia, perspiciatis facere ut quod tempora maiores voluptate saepe vero praesentium enim harum!</p>
    </div>

    <div class="d-flex">
        <div class="border-black border-top border-bottom w-50 m-4">
            <h2 class="ms-2">Host Info</h2>
            <div class="d-flex">
                <a href="#" class="d-flex align-items-center">
                    {{-- this a tag can go message page --}}
                <img src="{{ asset('asset_Araki/istockphoto-1300845620-612x612.jpg') }}" alt="User icon" class="w-20 my-2">
                <div class="d-flex flex-column justify-content-center">
                    <p class="ms-4 fs-3 text-black">Username</p>
                    <p class="ms-4 fs-3 text-black">Country</p>
                </div>
                </a>
            </div>

        </div>
        <div class="border-black border rounded w-50 m-4">
            <a href="#" class="d-flex align-items-center">
                {{-- this a tag can go review.index --}}
                <p class="fs-1 d-flex align-items-center text-black"><img src="{{ asset('asset_Araki/240_F_540091788_AvDyNUSbtnKQfNccukuFa3ZlsHFnMYrK.jpg') }}" alt="star" class="w-10 m-1">4.8 <span class="fs-4">(5 reviews)</span></p>
            </a>

            <p class="ms-4 fs-4 mb-0">Recent reviews</p>

            <div class="recent-review">

                <div class=" d-flex">
                    <img src="{{ asset('asset_Araki/istockphoto-1300845620-612x612.jpg') }}" alt="User icon" class="w-10 ms-4">
                    <p class="d-flex align-items-center fs-4 mb-0">This place was really nice and ...</p>
                </div>
                    <p class="text-end me-4 mb-1">yyyy/mm/dd</p>
            </div>
        </div>
    </div>

    <div class="coupon-section bg-yellow border-black border text-center rounded-5 w-25 mx-auto">
        <h3>Get coupon!</h3>
        <h3 class="fw-bold">10% OFF Coupon</h3>
    </div>

    <div class="google-location w-50 mx-auto">
        <h3>Location</h3>
        <img src="{{ asset('asset_Araki/07-01.jpg.webp')}}" alt="google_map" class="w-100 h-25">
    </div>
</div>

@endsection
