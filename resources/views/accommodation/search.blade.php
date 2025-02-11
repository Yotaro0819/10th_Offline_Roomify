@extends('layouts.app')

@section('title', 'Search')

@section('content')
<style>

    .card
    {
        background-color: #dcbf7d;
        border-radius: 30px;
        width: 360px;
    }

    .card-header
    {
        font-size: 24px;
        color: #004aad;

    }

    textarea
    {
        background-color: #ffffff;
    }

    .btn
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        font-weight: bold;
    }

    .btn:hover
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
    }
    .search-bar
    {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: 40px;
        font-size: 18px;
    }

    ::placeholder
    {
        text-align: center;
    }

    .form-select option
    {
        text-align: center
    }

    .input-group
    {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-group .input-icon
    {
        position: absolute;
        left:280px;
        top: 50%;
        transform: translateY(-50%);
        color: #dcbf7d;
        background-color:transparent;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 100%;
    }

    .input-group .form-control
    {
        padding-left: 2.5rem; /* Add padding to prevent text overlap with the icon */
        padding-right: 2.5rem; /* Add padding to prevent text overlap with the icon */
        border-radius: 10px;
        background-color: #ffffff;
    }
    .input-group-text
    {
        position: absolute;
        transform: translateY(-50%);
        border: none;
    }

    img
    {
        width: 270px;
        height: 200px;
    }
</style>

<div class="row gx-5 mx-3">
    <!-- search side -->
    <div class="col-4">
        <!-- address search -->
        <form action="{{ route('search_by_keyword')}}" method="get">
            @csrf
            @method("GET")

            <div class="card border-0">
                <div class="card-header">Keyword Search</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" style="border-radius:15px; color: black" name="keyword" placeholder="Type Keyword">
                        <button type="submit" class="btn input-icon input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('search_by_filters')}}" method="get">
            @csrf
            @method("GET")

            <!-- city -->
            <div class="card border-0">
                <div class="card-header">City</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" style="border-radius:15px; color: black" name="city" placeholder="Place you want to stay">
                    </div>
                </div>
            </div>

            <!-- capacity -->
            <div class="card border-0">
                <div class="card-header">Capacity</div>
                <div class="card-body">
                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_1" value="capa_1">
                        <label class="form-check-label" for="capa_1">1 ~ 2 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_2" value="capa_2">
                        <label class="form-check-label" for="capa_2">3 ~ 5 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_3" value="capa_3">
                        <label class="form-check-label" for="capa_3">6 ~ 10 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_4" value="capa_4">
                        <label class="form-check-label" for="capa_4">More than 10 people</label>
                    </div>
                </div>
            </div>

            <!-- category -->
            <div class="card border-0">
                <div class="card-header">Category</div>
                <div class="card-body">
                    @foreach($categories as $category)
                        <div class="search-bar">
                            <input type="checkbox" name="category[]" class="form-check-input" value="{{ $category->id }}" id="{{ $category->id }}">
                            <label class="form-check-label" for="{{ $category->id }}">{{ $category->category_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- price -->
            <div class="card border-0">
                <div class="card-header">Budget Range</div>
                <div class="card-body">
                    {{-- <div class="mb-2">
                        <label for="min_price" class="form-label left-align">Minimum</label>
                        <input type="range" class="form-range" name="min_price" style="color: black">
                    </div>

                    <div class="mb-2">
                        <label for="max_price" class="form-label left-align">Maximum</label>
                        <input type="range" class="form-range" name="max_price" style="color: black">
                    </div> --}}

                    <div class="range-slider">
                        <span class="slider-track"></span>
                        <input type="range" name="min_val" id="min_val" min="0" max="12000" value="2000">
                        <input type="range" name="max_val" id="max_val" min="0" max="12000" value="7000">
                        <div class="tooltip min-tooltip"></div>
                        <div class="tooltip max-tooltip"></div>

                    </div>
                    <div class="input-box">
                        <div class="min-box">
                            <div class="input-wrap">
                                <input type="text" name="min_input" class="input-field min-input">
                            </div>
                        </div>
                        <div class="max-box">
                            <div class="input-wrap">
                                <input type="text" name="max_input" class="input-field max-input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<style>
    .range-slider {
        position: relative;
        width: 100%;
        height: 5px;
        margin: 30px 0;
        background-color: #8a8a8a;
    }
/*
.slider-track {
    height: 100%;
    position: absolute;
    background-color: #fe696a;
}

.range-slider input {
    position: absolute;
    width: 100%;
    background: none;
    pointer-events: none;
    top: 50%;
    transform: translateY(-50%);
    appearance: none;
}

input[type="range"]::-webkit-slider-thumb {
    height: 25px;
    width: 25px;
    border-radius: 50%;
    border: 3px solid #FFF;
    background: #FFF;
    pointer-events: auto;
    appearance: none;
    cursor: pointer;
    box-shadow: 0 .125rem .5625rem -0.125rem rgba(0, 0, 0, .25);
}

input[type="range"]::-moz-range-thumb {
    height: 25px;
    width: 25px;
    border-radius: 50%;
    border: 3px solid #FFF;
    background: #FFF;
    pointer-events: auto;
    -moz-appearance: none;
    cursor: pointer;
    box-shadow: 0 .125rem .5625rem -0.125rem rgba(0, 0, 0, .25);
}


.input-box {
    display: flex;
}

.min-box,
.max-box {
    width: 50%;
}

.min-box {
    padding-right: .5rem;
    margin-right: .5rem;
}

.input-wrap {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}

.tooltip{
    padding: .25rem .5rem;
    border: 0;
    background-color: #373f50;
    color: #FFF;
    font-size: .75rem;
    line-height: 1.2;
    border-radius: .25rem;
    bottom: 120%;
    display: block;
    position: absolute;
    text-align: center;
    white-space: nowrap;
}

.min-tooltip{
    left: 50%;
    transform: translateX(-50%) translateY(-100%);
    z-index: 5;
}

.max-tooltip{
    right: 50%;
    transform: translateX(50%) translateY(-100%);
} */

</style>


            <div class="row my-4">
                <div class="col me-5">
                    <button type="submit" class="btn" style="width: 360px"><span class="fw-light">Search</span></button>
                </div>
            </div>
        </form>
    </div>

    <!-- results -->
    <div class="col-8">
        <div class="header">
            @if(isset($all_accommodations) && $all_accommodations->count() > 0)
                <p>Hits: {{ $all_accommodations->count() }}</p>
            <hr>
                @foreach($all_accommodations as $accommodation)
                    <a href="{{ route('accommodation.show', $accommodation->id )}}" class="row" style="color:black">
                        <div class="col">
                            <img src="#" alt="#">
                        </div>
                        <div class="col">
                            <h2 class="h4 fw-bold" style="color:#004aad">{{ $accommodation->name }}</h2>

                            <div>
                                <p><span><i class="fa-solid fa-magnifying-glass me-3"></i></span>{{ $accommodation->description}}</p>
                            </div>

                            <div>
                                <p><span><i class="fa-solid fa-location-dot me-3"></i></span>{{ $accommodation->address }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-money-bill me-3"></i></span>￥{{ $accommodation->price }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-users me-3"></i></span>{{ $accommodation->capacity }}</p>
                            </div>
                        </div>
                    </a>
                    <hr>

                @endforeach
            @else
                <div class="alert">
                    No accommodations found.
                </div>
            @endif


        </div>
    </div>


</div>
@endsection
