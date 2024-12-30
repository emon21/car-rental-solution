@extends('admin.layout.app')
@section('content')

<div class="bg-light rounded h-100 p-4">
    <div class="clearfix">
        <div class="float-start"><h6 class="mb-4">Cars Details</h6></div>
        <div class="float-end"><a href="{{ route('customers.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key=>$item)
                <tr>
                    <th scope="row">{{ $customers->firstItem() + $key }}</th>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                    <td>{{ $item->phone}}</td>
                    <td>{{ $item->address}}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('customers.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('customers.show',$item->id) }}" class="btn btn-primary">Show</a>
            <form action="{{ route('customers.destroy',$item->id) }}" method="post">
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
    {{$customers->links()}}
</div>

@endsection
