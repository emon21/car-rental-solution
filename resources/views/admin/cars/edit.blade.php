@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Edit Car</h6></div>
            <div class="float-end"><a href="{{ url('/admin/cars/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>
        <form action="{{ route('cars.update',$car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $car->id }}">

            <div class="form-group mb-2">
                <label class="form-label" for="name">Car Name</label>
                <input class="form-control" id="name" name="name" type="text" value="{{ $car->name }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="brand">Brand</label>
                <input class="form-control" id="brand" name="brand" type="text" value="{{ $car->brand }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="model">Model</label>
                <input class="form-control" id="model" name="model" type="text" value="{{ $car->model }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="year">Year of Manufacture</label>
                <input class="form-control" id="year" name="year" type="number" value="{{ $car->year }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="car_type">Car Type</label>
                <input class="form-control" id="car_type" name="car_type" type="text" value="{{ $car->car_type }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="daily_rent_price">Daily Rent Price</label>
                <input class="form-control" id="daily_rent_price" name="daily_rent_price" type="number" value="{{ $car->daily_rent_price }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="availability">Availability</label>
                <select class="form-control" id="availability" name="availability">
                    <option disabled>select an option</option>
                    <option value="1" {{ $car->availability == 1 ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ $car->availability == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label" for="formFile">Select Car Image</label>
                <input class="form-control" id="photo" name="image" type="file">
                <img id="showImage" class="form-check-input" src="{{ $car->image ? url($car->image) : url('images/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;">
            </div>


            <button class="btn btn-outline-success mt-3" type="submit">Update</button>
        </form>
    </div>
@endsection
