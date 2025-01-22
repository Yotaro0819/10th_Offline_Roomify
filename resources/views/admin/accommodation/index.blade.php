@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content')

<style>

.select-box
{
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 20px;
    background-color: #004aad;
}

.select-box i
{
    color: white;
    font-size: 4rem;
    opacity: 0.2;

}

.select-box p
{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 20px;
    color: white;
    font-weight: bold;

}

.card
{
    width: 200px;
    height: 250px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.card img {
    width: 100%;
    height: 33%;
    object-fit: cover;
}

.username{
    color: #dcbf7d;
}

.button-inactivate{
            padding: 10px 20px;
            font-size: 12px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100px;
            height: 50px;
        }

.button-activate {
    padding: 10px 20px;
    font-size: 14px;
    color: white;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width:  100px;
    height: 50px;
}

</style>

<main class="mt-3">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-users"></i>
                            </div>
                            <p class="mt-3 ">
                                Users
                            </p>
                        </div>
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-house-chimney"></i>
                            </div>
                            <p class="mt-3 ">
                                Accommodate
                            </p>
                        </div>
                        <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                            <div>
                            <i class="fa-solid fa-tags"></i>
                            </div>
                            <p class="mt-3 ">
                                Categories
                            </p>
                        </div>
                    </div>

                    <div class="col-10">
                        <div class="row">
                        <h3 class="col">
                            Accomodation list
                        </h3>
                        <div class="col">
                            <form action="#" class="w-50">
                                <input type="search" name="search" class="form-control" placeholder="Search...." style="border: 1px solid #ccc;">
                            </form>
                        </div>
                    </div>

                            <div class="row d-flex justify-content-between">
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-success"></i> &nbsp; activate
                                            <button class="button-inactivate">Inactivate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-danger"></i> &nbsp; Inactivate
                                            <button class="button-activate">activate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-success"></i> &nbsp; activate
                                            <button class="button-inactivate">Inactivate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-success"></i> &nbsp; activate
                                            <button class="button-inactivate">Inactivate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-success"></i> &nbsp; activate
                                            <button class="button-inactivate">Inactivate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="https://images.pexels.com/photos/279746/pexels-photo-279746.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="text-start m-0">AAA apartment</p>
                                            <p class="m-0 text-start">100 ,kredo street,Tokyo</p>
                                            <p class="username m-0 text-start">user1</p>
                                            <i class="fa-solid fa-circle text-success"></i> &nbsp; activate
                                            <button class="button-inactivate">Inactivate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
