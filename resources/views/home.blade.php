@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
h2{
    font-weight: bold;
    font-family: arial black;
}

.card{
    width: 900px;
    height: 200px;
    backdrop-filter: blur(6px);
}

.card h2 {
    margin: 16px 16px;
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
}

.search-form .form-container{
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    justify-content: space-between;
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
    top: 0;
    bottom: 0;
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

.search-form .form-control{
    position: relative;
    z-index: 1;
    background-color: transparent;
    padding: left;
}
.search-form input{
    padding: 5px;
    font-size: 16px;
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
}

.search-form button {
    margin-right: 5px;
    background-color: #dcbf7d;
    color: #fff;
    border-radius: 50%;
    font-size: 20px
}
</style>
<main>
    <section class="top">
        <div class="container">
            <img src="" alt="">
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
                
                <form action="" class="search-form">
                    <div class="form-container">
                        <div class="form-group">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" id="location" class="form-control" value="Which city do you prefer?">
                        </div>
                        
                        <div class="form-group">
                            <label for="check_in" class="form-label">Check in</label>
                            <div class="input-container">
                                <input type="date" id="check_in" class="form-control">
                                <span class="placeholder-text">Add Dates</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="check_out" class="form-label">Check out</label>
                            <input type="date" id="check_out" class="form-control" placeholder="Add Dates">
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

        </div>
    </section>
</main>
@endsection
