@extends('admin.layout.app')
@section('content')

<div class="bg-light rounded h-100 p-4">
    <div class="clearfix">
        <div class="float-start"><h6 class="mb-4">Cars Details</h6></div>
        <div class="float-end"><a href="{{ route('car.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    <div class="table-responsive">
        <table class="table">
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
                @foreach ($cars as $key=>$item)
                <tr>
                    <th scope="row">{{ $cars->firstItem() + $key }}</th>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->brand}}</td>
                    <td>{{ $item->model}}</td>
                    <td>{{ $item->year}}</td>
                    <td>{{ $item->car_type}}</td>
                    <td>{{ $item->daily_rent_price}}</td>
                    <td>{{ $item->availability ? 'Available' : 'Not Available' }}</td>
                    <td><img src="{{ url($item->image) }}" width="50px" alt=""></td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('cars.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('cars.show',$item->id) }}" class="btn btn-primary">Show</a>
            <form action="{{ route('cars.destroy',$item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="imgpath" value="{{$item->image}}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$cars->links()}}
</div>

@endsection
