@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Create Car</h6></div>
            <div class="float-end"><a href="{{ url('/admin/car/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>

        <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
                <label class="form-label" for="name">Car Name</label>
                <input class="form-control" id="name" name="name" type="text" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="brand">Brand</label>
                <input class="form-control" id="brand" name="brand" type="text" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="model">Model</label>
                <input class="form-control" id="model" name="model" type="text" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="year">Year of Manufacture</label>
                <input class="form-control" id="year" name="year" type="number" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="car_type">Car Type</label>
                <input class="form-control" id="car_type" name="car_type" type="text" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="daily_rent_price">Daily Rent Price</label>
                <input class="form-control" id="daily_rent_price" name="daily_rent_price" type="number" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="availability">Availability</label>
                <select class="form-control" id="availability" name="availability">
                    <option selected disabled>select an option</option>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label" for="formFile">Select Car Image</label>
                <input class="form-control" id="image" name="image" type="file">
            </div>

            <button class="btn btn-outline-success mt-3" type="submit">Create</button>
        </form>
    </div>

@endsection
