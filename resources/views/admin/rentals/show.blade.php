<!-- resources/views/admin/cars/show.blade.php -->
@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Rental Details</h6></div>
            <div class="float-end"><a href="{{ url('/admin/rental/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $rental->name }}</h5>
                <p class="card-text"><strong>Customer Name:</strong> {{ $rental->user->name }}</p>
                <p class="card-text"><strong>Model:</strong> {{ $rental->car->model }}</p>
                <p class="card-text"><strong>Year of Manufacture:</strong> {{ $rental->car->year }}</p>
                <p class="card-text"><strong>Car Type:</strong> {{ $rental->car->car_type }}</p>
                <p class="card-text"><strong>Daily Rent Price:</strong> ${{ $rental->car->daily_rent_price }}</p>
                <p class="card-text"><strong>Availability:</strong> {{ $rental->car->availability == 1 ? 'Available' : 'Not Available' }}</p>

                <div class="mb-3">
                    <label class="form-label">Car Image:</label><br>
                    <img src="{{ $rental->car->image ? url($rental->car->image) : url('images/no_image.jpg') }}" alt="Car Image" style="width:200px; height: 150px;">
                </div>
            </div>
        </div>
    </div>

@endsection
