@extends('frontend.layout.app')
@section('content')

<div class="container p-4">
    <div class="card shadow-lg rounded-lg overflow-hidden">
        <div class="row g-0">
            <!-- Car Image -->
            <div class="col-md-6">
                <img src="{{ asset($car->image) }}" alt="{{ $car->name }}" class="img-fluid w-100 h-100 object-cover">
            </div>

            <!-- Car Details -->
            <div class="col-md-6 p-4">
                <h1 class="display-5 fw-bold text-dark">{{ $car->name }}</h1>
                <p class="text-muted">Brand: {{ $car->brand }}</p>
                <p class="text-muted">Model: {{ $car->model }}</p>
                <p class="text-muted">Year: {{ $car->year }}</p>
                <p class="text-muted">Type: {{ $car->car_type }}</p>
                <p class="fs-4 fw-bold mt-4 mb-4">Daily Rent: BDT {{ number_format($car->daily_rent_price) }}</p>

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="" method="POST" class="row g-2">
                    @csrf
                    <div class="col-6">
                        <label for="start_date" class="form-label fw-bold">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" min="{{ date('Y-m-d') }}" required
                            class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="end_date" class="form-label fw-bold">End Date:</label>
                        <input type="date" name="end_date" id="end_date" min="{{ date('Y-m-d') }}" required
                            class="form-control">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary fw-bold px-5 mt-3">
                            Book Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
