@extends('frontend.customer_dashboard.layout.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th>Car Name</th>
                        <th>Car Brand</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Date</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $key => $item)
                        <tr>
                            <th scope="row">{{ $rentals->firstItem() + $key }}</th>
                            <td>{{ $item->car->name }}</td>
                            <td>{{ $item->car->brand }}</td>
                            <td>{{ Carbon\Carbon::parse($item->start_date)->format('d M, Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($item->end_date)->format('d M, Y') }}</td>
                            @php
                                $formatted_dt1 = Carbon\Carbon::parse($item->start_date);
                                $formatted_dt2 = Carbon\Carbon::parse($item->end_date);
                                $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
                            @endphp


                            <td>{{ (Carbon\Carbon::parse($item->start_date))->diffInDays(Carbon\Carbon::parse($item->end_date)) }}</td>
                            <td>{{ '$' . $item->total_cost }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <form action="{{ route('cancelBooking', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Cencel</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $rentals->links() }}
    </div>
@endsection
