@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Create Car</h6></div>
            <div class="float-end"><a href="{{ url('/admin/cars/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>

        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
                <label class="form-label" for="name">Customer Name</label>
                <input class="form-control" name="name" type="text" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="email">Customer email</label>
                <input class="form-control" name="email" type="email" value="">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="phone">Customer phone</label>
                <input class="form-control" name="phone" type="text" value="">
            </div>
            <div class="form-group mb-2">
                <label class="form-label" for="address">Customer address</label>
                <textarea name="address" class="form-control"  cols="30" rows="10"></textarea>
            </div>

            <button class="btn btn-outline-success mt-3" type="submit">Create</button>
        </form>
    </div>

@endsection
