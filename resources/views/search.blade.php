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

    ::placeholder
    {
        text-align: center;
    }

    .btn
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        align-content: center;
        font-weight: bold;
    }

    .btn:hover
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
    }
</style>

<div class="row gx-5 mx-3">
    <!-- search side -->
    <div class="col-4">
        <form action="#" method="get">
            <div class="card border-0">
                <div class="card-header">Place you want to stay</div>
                <div class="card-body">
                    <label class="form-label">
                        <div class="dropdown mb-3">
                            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Area<span class="caret"></span></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" type="button">Center</button>
                            <button class="dropdown-item" type="button">North</button>
                            <button class="dropdown-item" type="button">South</button>
                            <button class="dropdown-item" type="button">East side</button>
                            <button class="dropdown-item" type="button">West side</button>
                            </div>
                        </div>

                        <textarea class="form-control" name="place" id="" cols="30" rows="1" placeholder="Address Search"></textarea>
                    </label>
                </div>
            </div>

            <!-- capacity -->
            <div class="card border-0">
                <div class="card-header">Capacity</div>
                <div class="card-body">
                    <div class="text-center">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_1">
                        <label class="form-check-label" for="capa_1">1 ~ 2 people</label>
                    </div>

                    <div>
                        <input type="radio" class="form-check-input" name="capacity" id="capa_2">
                        <label class="form-check-label" for="capa_2">3 ~ 5 people</label>
                    </div>

                    <div>
                        <input type="radio" class="form-check-input" name="capacity" id="capa_3">
                        <label class="form-check-label" for="capa_3">6 ~ 10 people</label>
                    </div>

                    <div>
                        <input type="radio" class="form-check-input" name="capacity" id="capa_4">
                        <label class="form-check-label" for="capa_4">More than 10 people</label>
                    </div>
                </div>
            </div>

            <!-- category -->
            <div class="card border-0">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <div>
                        <input type="checkbox" class="form-check-input" value="" id="">
                        <label class="form-check-label" for="">WI-FI</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Kitchen</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Nice View</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Parking</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">TV</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Air Conditioner</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Washer</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Hair Dryer</label>
                    </div>

                    <div>
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Refrigerator</label>
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="card border-0">
                <div class="card-header">Price Range</div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="min_price" class="form-label">Minimum</label>
                        <input type="number" class="form-control" name="min_price">
                    </div>

                    <div class="mb-2">
                        <label for="max_price" class="form-label">Maximum</label>
                        <input type="number" class="form-control" name="max_price">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col me-5">
                    <button type="submit" class="btn" style="width: 360px"><span class="fw-light">Search</span></button>
                </div>
            </div>
        </form>
    </div>

    <!-- results -->
    <div class="col-8">
        <div class="header">
            <p>Hits: 122 matched</p>
            <hr>

        </div>

    </div>
</div>

@endsection
