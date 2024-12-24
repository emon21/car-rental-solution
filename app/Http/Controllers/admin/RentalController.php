<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rentals = Rental::with('user', 'car')->latest()->paginate(5);
        return view('admin.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customers = User::where('role', 'customer')->get();
        $cars = Car::where('availability', 1)->get();
        return view('admin.rentals.create', compact('customers', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => "required",
            'car_id' => "required",
            'start_date' => "required|date",
            'end_date' => "required|date|after_or_equal:start_date",
            'status' => "required|"
        ]);

        $userID = $request->user_id;
        $carId = $request->car_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;



        //check if car if available for selected date range 

        if (!$this->isCarAvailable($carId, $startDate, $endDate)) {
            return redirect()->route('rental.index')->with('error', 'Car is not available for selected dates');
        }



        //get days between two days

        $days = ((strtotime($endDate) - strtotime($startDate)) / 86400 + 1);
        // $car = Car::findOrFail(intval($carId));
        $car = Car::findOrFail($carId);
        $totalPrice = $days * $car->daily_rent_price;

        Rental::create([
            'user_id' => $userID,
            'car_id' => $carId,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_cost' => $totalPrice,
            'status' => $request->status,

        ]);

        return redirect()->route('rental.index')->with('success', 'Rental Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        

        $rental = Rental::with('user', 'car')->where('id', $id)->first();
        // return $rental;

        return view('admin.rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $customers = User::where('role', 'customer')->get();
        $cars = Car::where('availability', 1)->get();

        $rental = Rental::with('user', 'car')->where('id', $id)->first();

        return view('admin.rentals.edit', compact('customers', 'cars', 'rental'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'user_id' => "required",
            'car_id' => "required",
            'start_date' => "required|date",
            'end_date' => "required|date|after_or_equal:start_date",
            'status' => "required"
        ]);
        $userID = $request->user_id;
        $carId = $request->car_id;

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        //check if car if available for selected date range 
        if (!$this->isCarAvailable($carId, $startDate, $endDate, $id)) {
            return redirect()->route('rental.index')->with('error', 'Car is not available for selected dates');
        }

        //get days between two days

        $days = (strtotime($endDate) - strtotime($startDate)) / 86400 == 0 ? 1 : (strtotime($endDate) - strtotime($startDate)) / 86400;

        // $car = Car::findOrFail(intval($carId));
        $car = Car::findOrFail($carId);
        $totalPrice = $days * $car->daily_rent_price;

        $rental = Rental::findOrFail($id);

        $rental->update([
            'user_id' => $userID,
            'car_id' => $carId,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_cost' => $totalPrice,
            'status' => $request->status,
        ]);
        return redirect()->route('rental.index')->with('success', 'Rental Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
        if($rental->status == "Ongoing"){
            return redirect()->route('rental.index')->with('error', 'Ongoing Rentals cannot be Deleted');

        }
        $rental->delete();
        return redirect()->route('rental.index')->with('success', 'Rentals Deleted Successfully');


    }

    public function isCarAvailable($carId, $startDate, $endDate, $rentalId = null)
    {

        // $dateOverLap = Rental::where('car_id',$carId)
        // ->where('start_dat',$startDate)
        // ->where('end_date',$endDate)->first();

        $dateOverLap = Rental::where('user_id', $carId)

            ->where(function ($query) use ($startDate, $endDate) {

                $query->whereBetween('start_date', [$startDate, $endDate])

                    ->orWhereBetween('end_date', [$startDate, $endDate])

                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })

            ->when($rentalId, function ($query) use ($rentalId) {
                $query->where('id', '!=', $rentalId);
            })
            ->exists();
        return !$dateOverLap;
    }
}
