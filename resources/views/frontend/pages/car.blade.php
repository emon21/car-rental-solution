@extends('frontend.layout.app')
@section('content')
    <!-- Hero Section -->
    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Bootstrap Tutorial</h1>
                <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first
                    projects on the web.</p>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 text-success font-bold">Featured Cars</h2>
            <div class="row">
                @forelse ($cars as $car)
                    <div class="col-md-4">
                        <div class="card my-2">
                            <img src="{{ asset($car->image) }}" class="card-img-top my-2" alt="{{ $car->brand }}" style="height: 280px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="card-text">Brand: {{ $car->brand }}<br>Daily Rent: ${{ $car->daily_rent_price }}
                                </p>
                                <a href="{{ route('frontend.rentals') }}" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                @empty

                    <span class="text-danger text-center">No Car Available</span>
                @endforelse

                {{ $cars->links() }}

            </div>
        </div>
    </section>
@endsection
