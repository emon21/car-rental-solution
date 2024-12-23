@extends('frontend.layout.app')
@section('content')
    
    <!-- Hero Section -->
    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Rent the Best Cars with <span class="text-warning">Affordable Prices</span></h1>
                    <p class="lead my-4">
                        Explore a wide range of cars for your trips. From luxury to economy, we have the perfect vehicle for every occasion.
                    </p>
                    <a href="#" class="btn btn-primary btn-lg">Browse Cars</a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="https://via.placeholder.com/600x400" alt="Car Image">
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Cars</h2>
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Car 1">
                        <div class="card-body">
                            <h5 class="card-title">Luxury Sedan</h5>
                            <p class="card-text">Brand: Mercedes-Benz<br>Daily Rent: $100</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Car 2">
                        <div class="card-body">
                            <h5 class="card-title">SUV</h5>
                            <p class="card-text">Brand: Toyota<br>Daily Rent: $80</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Car 3">
                        <div class="card-body">
                            <h5 class="card-title">Economy Hatchback</h5>
                            <p class="card-text">Brand: Honda<br>Daily Rent: $50</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


 @endsection
