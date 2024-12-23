<!-- resources/views/admin/cars/show.blade.php -->
@extends('admin.layout.app')
@section('content')

    <div class="rounded h-auto p-4">
        <div class="clearfix">
            <div class="float-start"><h6 class="mb-4">Car Details</h6></div>
            <div class="float-end"><a href="{{ url('/admin/customers/') }}" class="btn btn-success mb-3">Back</a></div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $customer->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $customer->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $customer->phone }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $customer->address }}</p>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <h3>Rental History</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th>Car</th>
                        <th>start_date</th>
                        <th>end_date</th>
                        <th>total_cost</th>
                        <th>status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $key=>$item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->car ? $item->car->name : ''}}</td>
                        <td>{{ $item->start_date}}</td>
                        <td>{{ $item->end_date}}</td>
                        <td>{{ $item->total_cost}}</td>
                        <td>{{ $item->status}}</td>
                        <td>
                            <div class="d-flex gap-3">
                    <a href="{{ route('rentals.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('rentals.destroy',$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$rentals->links()}}
    </div>



@endsection
