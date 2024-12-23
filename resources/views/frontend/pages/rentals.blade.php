@extends('frontend.layout.app')
@section('content')
    <!-- Rentals Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4">Available Cars for Rent</h1>

            <!-- Filter Section -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <select class="form-select" aria-label="Filter by Car Type">
                        <option selected>Filter by Car Type</option>
                        <option value="SUV">SUV</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Hatchback">Hatchback</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" aria-label="Filter by Brand">
                        <option selected>Filter by Brand</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="BMW">BMW</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" aria-label="Filter by Price">
                        <option selected>Filter by Daily Rent Price</option>
                        <option value="low_to_high">Low to High</option>
                        <option value="high_to_low">High to Low</option>
                    </select>
                </div>
            </div>

            <!-- Car Listing -->
            <div class="row">
                <!-- Car 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title">Toyota Corolla</h5>
                            <p class="card-text">Brand: Toyota | Type: Sedan | Year: 2020</p>
                            <p class="card-text">Daily Rent: $50</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>

                <!-- Car 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title">Honda Civic</h5>
                            <p class="card-text">Brand: Honda | Type: Sedan | Year: 2019</p>
                            <p class="card-text">Daily Rent: $45</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>

                <!-- Car 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title">BMW X5</h5>
                            <p class="card-text">Brand: BMW | Type: SUV | Year: 2021</p>
                            <p class="card-text">Daily Rent: $100</p>
                            <a href="#" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
