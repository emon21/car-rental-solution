@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Create Rental</h6></div>
            <div class="float-end"><a href="{{ url('/admin/rentals/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>

        <form action="{{ route('rentals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row gap-2">
                <div class="form-group">
                    <label for="user_id">Customer</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option disabled>Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('user_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="car_id">Car</label>
                    <select class="form-control" id="car_id" name="car_id" required>
                        <option disabled>Select Car</option>
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                {{ $car->name }}</option>
                        @endforeach
                    </select>
                    @error('car_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input class="form-control" id="start_date" name="start_date" type="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input class="form-control" id="end_date" name="end_date" type="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option selected>Select an option</option>
                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Canceled" {{ old('status') == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-outline-success mt-3" type="submit">Create</button>
        </form>
    </div>

@endsection
