@extends('layouts.app')

@section('content')
<style>
html, body {
    margin: 0;
    padding: 0;
}

#carouselSlides{
    position: relative;
}
.carousel-item {
    height: 650px;
    width: 100%;
    margin-top: 20px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 30px;
}
.carousel-content{
    position: absolute;
    top: 55%;
    left: 45%;
    transform: translate(-50%, -50%);
    margin-top: 30px;
    z-index: 10;
    color: white;
    text-align: center;

}
h2{
    font-weight: bold;
    font-family: arial black;
    text-align: left;
    margin-right: 400px;
}
.card{
    width: 900px;
    height: 200px;
    border: 0;
}

.card h2 {
    margin: 16px 16px;
    text-align: left;
}

.search-form{
    border-radius: 50px;
    padding: 8px;
    margin: 8px;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F0F0F0;
    margin-top: -10px;
}

.search-form .form-container{
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    justify-content: space-between;
    height: 100px;
}

.search-form .form-group{
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 16px;
    flex: 1;
    min-width: 120px;
}

.search-form .form-group::before{
    content: "";
    position: absolute;
    top: 10%;
    bottom: 10%;
    left: 0;
    width: 1px;
    background: black;
}

.search-form .form-group:first-child::before {
    display: none;
}

.search-form label{
    font-weight: bold;
    margin-bottom: 5px;
}

.search-form .input-container{
    position: relative;
    display: inline-block;
    width: 100%;
}

.search-form .form-control {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50px;
    padding: 10px;
    color: #000;
    height: 30px;
}

.search-form input{
    padding: 5px;
    font-size: 16px;
    color: #dcbf7d;
}

input::placeholder {
    font-size: 12px;
    color: #dcbf7d;
}

.search-form .placeholder-text{
    position: absolute;
    top: 50%;
    left: 8px;
    transform: translateY(-50%);
    pointer-events: none;
    transition: all 0.2s ease;
}

.form-control:focus + .placeholder-text,
.form-control:not(:placeholder-shown) + .placeholder-text {
    opacity: 0;
    visibility: hidden;
}

.search-form button{
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    margin-right: 5px;
    background-color: #dcbf7d;
    color: #fff;
    border-radius: 50%;
    font-size: 20px
}

#keyword {
    border: 1px solid #000;
    border-radius: 30px;
    padding: 5px;
    background-color: #fff;
}

.hosting{
    background-color: #eeeeee;
    height: 500px;
    padding: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 200px 0;
    flex-wrap: wrap;
}

.hosting .col-6 {
    flex: 1;
    margin: 10px;
}

.hosting h2 {
    white-space: nowrap;
    font-size: 2rem;
    margin: 0;
}

.hosting .image2{
    border-radius: 50px;
    margin-top: -30px;
}

.hosting .btn{
    background-color: #dcbf7d;
    color: #ffffff;
    width: 170px;
    padding: 20px;
    border-radius: 40px;
}

.properties h2 {
    width: 315px;
    color: #004aad;
    border-bottom: 5px solid #dcbf7d;
    margin-bottom: 10px;
    text-align: left;
    position: relative;
    /* top: -100px; */
}

.properties .card {
        width: 320px; /* カードの幅 */
        height: 400px; /* カードの高さ */
        border-radius: 10px; /* 角を丸く */
        overflow: hidden; /* はみ出し防止 */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* 影をつける */
    }

.properties .card img {
    width: 100%; /* 親要素に対して幅を100% */
    height: 200px; /* 高さを固定 */
    object-fit: cover; /* 縦横比を保ちつつカードにフィット */
    border-radius: 10px;
}

.properties .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 22px; /* カード同士の間隔 */
        justify-content: center;
        padding: 20px 20px;
        align-items: start;
    }

.properties .card-container .card{
    width: calc(33.33% - 16px);
    height: fit-content;
    padding: 10px;
    text-align: left;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 0 !important;
}

.properties .card-container .card h3{
    font-weight: bold;
    font-size: larger;
}

.properties .card-container .card .address{
    color:#6c757d;
}

.properties .card .row {
    display: flex;
    justify-content: flex-start;
    gap: 8px;
}

.properties .card .row p {
    margin-bottom: 0;
}

.properties .card .row .col-auto {
    text-align: left;
}

#price{
    color: #004aad;
    font-weight: bold;
    font-size: large;
}
.discover{
    height: 500px;
    padding: 80px;
    display: flex;
    align-items: center;
    margin: 200px 0;
}

.discover .btn{
    background-color: #dcbf7d;
    color: #ffffff;
    width: fit-content;
    padding: 20px;
    border-radius: 40px;
}

.discover h2 {
    width: 315px;
    color: #004aad;
    border-bottom: 5px solid #dcbf7d;
    margin-bottom: 10px;
}

.discover .image3{
    border-radius: 50px;
    margin-top: -30px;
}

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.01);
        backdrop-filter: blur(2px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .loader{
        margin:200px auto;
    }
    #searching{
        color: #000;
        font-size:20px;
        letter-spacing:1px;
        font-weight: bold;
        text-align:center;
    }
    .loader span{
        width:24px;
        height:24px;
        border-radius:50%;
        display:inline-block;
        position:absolute;
        left:50%;
        margin-left:-20px;
        -webkit-animation:3s infinite linear;
        -moz-animation:3s infinite linear;
        -o-animation:3s infinite linear;
    }

    .loader span:nth-child(2){
        background:#004aad;
        -webkit-animation:kiri 1.2s infinite linear;
        -moz-animation:kiri 1.2s infinite linear;
        -o-animation:kiri 1.2s infinite linear;
    }
    .loader span:nth-child(3){
        background: #dcbf7d;
        z-index:100;
    }
    .loader span:nth-child(4){
        background: #6a6c6e26;
        -webkit-animation:kanan 1.2s infinite linear;
        -moz-animation:kanan 1.2s infinite linear;
        -o-animation:kanan 1.2s infinite linear;
    }

    @-webkit-keyframes kanan {
        0% {-webkit-transform:translateX(20px);
        }
        50%{-webkit-transform:translateX(-20px);
        }
        100%{-webkit-transform:translateX(20px);
            z-index:200;
        }
    }
    @-moz-keyframes kanan {
        0% {-moz-transform:translateX(20px);
        }
        50%{-moz-transform:translateX(-20px);
        }
        100%{-moz-transform:translateX(20px);
        z-index:200;
        }
    }
    @-o-keyframes kanan {
        0% {-o-transform:translateX(20px);
        }
        50%{-o-transform:translateX(-20px);
        }
        100%{-o-transform:translateX(20px);
        z-index:200;
        }
    }
    @-webkit-keyframes kiri {
        0% {-webkit-transform:translateX(-20px);
        z-index:200;
        }
        50%{-webkit-transform:translateX(20px);
        }
        100%{-webkit-transform:translateX(-20px);
        }
    }

    @-moz-keyframes kiri {
        0% {-moz-transform:translateX(-20px);
        z-index:200;
            }
        50%{-moz-transform:translateX(20px);
        }
        100%{-moz-transform:translateX(-20px);
        }
    }
    @-o-keyframes kiri {
        0% {-o-transform:translateX(-20px);
        z-index:200;
            }
        50%{-o-transform:translateX(20px);
        }
        100%{-o-transform:translateX(-20px);
        }
    }
</style>
<main>
<!-- loading animation -->
<div class="loading-overlay">
    <div class="loader">
        <h1 id="searching">Searching...</h1>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
    <section class="top">
        <div class="container">
            <!-- background images -->
            <div id="carouselSlides" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('https://images.pexels.com/photos/30752423/pexels-photo-30752423/free-photo-of-countryside-village-houses-under-cloudy-sky.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');" data-bs-interval="3000">
                    </div>
                    <div class="carousel-item" style="background-image: url('https://images.pexels.com/photos/29617805/pexels-photo-29617805/free-photo-of-traditional-japanese-shoji-screens-framing-a-garden-view.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');" data-bs-interval="3000">
                    </div>
                    <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1687008817163-6a1e4a73cdb2?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');" data-bs-interval="3000">
                    </div>
                </div>
            </div>

            <div class="carousel-content">
                <h2>
                    Stay Unique,<br>
                    Experience Authentic Tokyo.
                </h2>

                <p class="text-start pt-3">
                    Turn your Tokyo trip into a personal story. <br>
                    Unique stays, unforgettable moments, and memorises to last a lifetime.
                </p>

                <div class="card pt-5">
                    <form action="{{ route('home.search') }}" class="search-form" method="get">
                      @csrf
                      @method("GET")
                        <div class="form-container">
                            <div class="form-group">
                                <label for="city" class="form-label text-start">Location</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter City Name" required>
                            </div>

                            <div class="form-group">
                                <label for="daterange" class="form-label text-start">Dates</label>
                                <input type="text" id="daterange" class="form-control" name="daterange" value="{{ request()->input('daterange') }}" placeholder="Check In - Check Out" required>
                            </div>

                            <div class="form-group">
                                <label for="capacity" class="form-label text-start">Travelers</label>
                                <input type="number" name="capacity" id="capacity" class="form-control" placeholder="2 Travelers" required>
                            </div>

                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <section class="hosting">
        <div class="container row">
            <div class="col-6">
                <h2>Try Hosting With Us</h2>
                <br>
                <p>Earn extra just by renting your propety...</p>
                <br>
                @if(Auth::check() && Auth::user()->role == '2')
                <a href="{{ route('host.index')}}" class="btn">Go host page</a>
                @else
                <a href="{{ route('hostRequest.create')}}" class="btn">Become A Host</a>
                @endif
            </div>
            <div class="col-6">
                <img src="https://images.pexels.com/photos/16095241/pexels-photo-16095241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" style="float: right; margin-left: 10px; height: 400px; wight: 1600px;" class="image2">
            </div>
        </div>
    </section>

    <section class="properties">
        <div class="container d-flex">
            <div class="w-100">
                <h2 class="ms-0">
                    Featured Properties<br>
                    on our Listing
                </h2>
                <div class="card-container">
                    @foreach($accommodations->take(6) as $accommodation)
                     <div class="card">
                        <a href="{{ route('accommodation.show', $accommodation->id) }}" class="stretched-link">
                            <img src="{{ asset('storage/' . $accommodation->photos[0]->image) }}" alt="#" style="width: 375px; height: 200px;">
                            <h3 class="mt-2">{{ Str::limit($accommodation->name, 50) }}</h3>
                            <p class="address">{{ Str::limit($accommodation->address, 50) }}</p>
                            <div class="row">
                                <div class="col-auto">
                                    <p><i class="fa-solid fa-users me-2"></i></i> {{ $accommodation->capacity }} Sleeps</p>
                                </div>
                                <div class="col-auto">
                                    <p><i class="fa-solid fa-location-dot me-2"></i>{{ $accommodation->city }}</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-auto">
                                    <h4 id="price">¥{{ $accommodation->price }} ~</h4>
                                </div>
                            </div>
                        </a>
                     </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="discover">
        <div class="container row">
                <div class="col-6">
                    @if(Auth::check() && Auth::user()->role == '2')
                        <h2>Writing a Newsletter!</h2>
                        <p>When you list a property, you can send a newsletter<br>
                         to past guests who have stayed there before!</p>
                        <a href="{{ route('newsletter.index') }} " class="btn">Try Writing a Newsletter</a>
                    @else
                        <h2>Would You Like to Receive Newsletters ?</h2>
                        <p>You can recieve newsletters from the hosts of <br>
                            accommodations you've stayed at in past!</p>
                            @if(Auth::check())
                                <a href="{{ url('/newsletter') }}" class="btn">Check Your Newsletter</a>
                            @else
                                <a href="{{ route('login') }}" class="btn">Check Your Newsletter</a>
                            @endif
                    @endif
                </div>
                <div class="col-6">
                    <img src="https://images.pexels.com/photos/16277345/pexels-photo-16277345.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" style="float: right; margin-left: 10px; height: 400px; wight: 1600px;" class="image3">
                </div>
            </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(1, 'days').format('YYYY-MM-DD'),
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // loading animation
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        const overlay = document.querySelector('.loading-overlay');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            overlay.style.display = 'flex';

            setTimeout(() => {
                form.submit();
            }, 3000);
        });
    });
});
</script>
@endsection
