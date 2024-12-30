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
                @forelse ($cars as $item)
                    <div class="col-md-4">
                    <div class="card border border-success">
                        <img src="{{ asset($item->image) }}" class="card-img-top h-32 w-20 py-3" alt="Car 1" height="180" width="120">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Brand: {{ $item->brand }}<br>Daily Rent: ${{ $item->daily_rent_price }}</p>
                            <a href="{{ route('frontend.rentals') }}" class="btn btn-outline-primary">Rent Now</a>
                        </div>
                    </div>
                </div>
                @empty

                <span class="text-danger text-center">No Car Available</span>
                    
                @endforelse 
                
            </div>
        </div>
    </section>


 @endsection
