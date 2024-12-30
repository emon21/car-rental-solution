@extends('admin.layout.app')
@section('content')

    <div class="rounded h-100 p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Edit Customer</h6></div>
            <div class="float-end"><a href="{{ url('/admin/customers') }}" class="btn btn-success mb-3">Back</a></div>
        </div>
        <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $customer->id }}">

            <div class="form-group mb-2">
                <label class="form-label" for="name">Customer Name</label>
                <input class="form-control" name="name" type="text" value="{{ $customer->name }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="email">Customer email</label>
                <input class="form-control" name="email" type="email" value="{{ $customer->email }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="phone">Customer phone</label>
                <input class="form-control" name="phone" type="text" value="{{ $customer->phone }}">
            </div>
            <div class="form-group mb-2">
                <label class="form-label" for="address">Customer address</label>
                <textarea name="address" class="form-control"  cols="30" rows="10">{{ $customer->address }}</textarea>
            </div>

            <button class="btn btn-outline-success mt-3" type="submit">Update</button>
        </form>
    </div>
@endsection
