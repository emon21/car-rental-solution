@extends('admin.layout.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        <div class="clearfix my-2">
            <div class="float-start">
                <h6 class="py-3">Cars Details</h6>
            </div>
            <div class="float-end">
                <a href="{{ route('car.create') }}" class="btn btn-outline-primary">Create Car</a>
            </div>
        </div>
        <div class="">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">model</th>
                        <th scope="col">year</th>
                        <th scope="col">car_type</th>
                        <th scope="col">daily_rent_price</th>
                        <th scope="col">availability</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $key => $item)
                        <tr>
                            <th scope="row">{{ $cars->firstItem() + $key }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->model }}</td>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->car_type }}</td>
                            <td>{{ $item->daily_rent_price }}</td>
                            <td>
                                {{-- {{ $item->availability ? 'Available' : 'Not Available' }} --}}
                                @if ($item->availability)
                                    <span class="text-success font-bold text-lg">Available</span>
                                @else
                                    <span class="text-danger font-bold text-lg">Not Available</span>
                                @endif
                            </td>
                            <td><img class="d-flex align-middle  rounded" src="{{ url($item->image) }}" width="150px"
                                    alt=""></td>
                            {{-- <td><img src="{{ asset($item->image) }}" width="50px" alt=""></td> --}}
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('car.show', $item->id) }}" class="btn btn-success">Show</a>
                                    <a href="{{ route('car.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('car.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="imgpath" value="{{ $item->image }}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $cars->links() }}
    </div>
@endsection
