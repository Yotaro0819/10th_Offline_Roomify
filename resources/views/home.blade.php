@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
html, body {
    margin: 0;
    padding: 0;
}

#hero{
    background-image: url('https://images.pexels.com/photos/16663162/pexels-photo-16663162.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 700px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    padding: 20px;
    border-radius: 30px;
}

h2{
    font-weight: bold;
    font-family: arial black;
    text-align: left;
    margin-right: 400px;
}

#hero_p{
    margin-right: 500px;
}

.card{
    width: 900px;
    height: 200px;
    backdrop-filter: blur(6px);
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    padding: 20px;
}

.card h2 {
    margin: 16px 16px;
    text-align: left;
}

.search-form{
    border: 1px solid;
    border-radius: 50px;
    padding: 8px;
    margin: 8px;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
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
    border-radius: 5px;
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
    top: -100px;
}

.card-container{
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.card-container .card{
    width: calc(33.33% - 16px);
    padding: 10px;
    text-align: left;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-container .card h3{
    font-family: arial black;
}

.card-container .card .address{
    color: #dcbf7d;
}

.card .row {
    display: flex;
    justify-content: flex-start;
    gap: 8px;
}

.card .row .col-auto {
    text-align: left;
}

#price{
    color: #004aad;
    font-family: arial black;
}

#night{
    color: #004aad;
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
    width: 170px;
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
</style>
<main>
    <section class="top">
        <div class="container" id="hero">
            <h2>
                Stay Unique,<br>
                Experience Authentic Tokyo.
            </h2>
            <br>
            <p>
                Turn your Tokyo trip into a personal story.Unique stays,<br>
                unforgettable moments, and memorises to last a lifetime.
            </p>
            <br>
            <div class="card">
                <h2>FIND</h2>

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
                     <div class="card mx-auto">
                        <a href="{{ route('accommodation.show', $accommodation->id) }}" class="stretched-link">
                            @if ($accommodation->photos->isNotEmpty())
                                <img src="{{ $accommodation->photos->first()->url }}" alt="Accommodation Image">
                            @else
                                <img src="{{ asset('images/default-image.jpg') }}" alt="No Image Available">
                            @endif
                            <h3>{{ $accommodation->name }}</h3>
                            <p class="address">{{ $accommodation->address }}</p>
                            <div class="row">
                                <div class="col-auto">
                                    <h4 id="price">${{ $accommodation->price }}</h4>
                                </div>
                                <div class="col-auto">
                                    <p id="night">/ {{ $accommodation->capacity }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <p><i class="fa-regular fa-user"></i> {{ $accommodation->capacity }}Sleeps</p>
                                </div>
                                <div class="col-auto">
                                    <p><i class="fa-solid fa-up-right-and-down-left-from-center"></i> {{ $accommodation->city }}</p>
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
                        <!-- <a href="{{ url('/newsletter') }}" class="btn">Check Your Newsletter</a> -->
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
</script>
@endsection
