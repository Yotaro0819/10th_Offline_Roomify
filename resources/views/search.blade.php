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
        color: #000000;

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

            <div class="card border-0">
                <div class="card-header">Capacity</div>
                <div class="card-body">
                    <label class="form-check-label" for="capa_1">1 </label>
                    <input type="radio" class="form-check-input" name="capa_1">
                </div>
            </div>
        </form>
    </div>

    <!-- results -->
    <div class="col-8">

    </div>
</div>

@endsection
