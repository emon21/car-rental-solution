@extends('admin.layout.app')
@section('content')

<div class="bg-light rounded h-100 p-4">
    <div class="clearfix">
        <div class="float-start"><h6 class="mb-4">Rentals Details</h6></div>
        <div class="float-end"><a href="{{ route('rentals.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th>Customer Name</th>
                    <th>Car Details (Name, Brand)</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $key=>$item)
                <tr>
                    <th scope="row">{{ $rentals->firstItem() + $key }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->car->name }} ({{ $item->car->brand }})</td>
                    <td>{{ Carbon\Carbon::parse($item->start_date)->format('d M, Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($item->end_date)->format('d M, Y') }}</td>
                    <td>{{ $item->total_cost }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('rentals.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('rentals.show',$item->id) }}" class="btn btn-primary">Show</a>
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
