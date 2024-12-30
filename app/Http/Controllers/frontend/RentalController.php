<?php

namespace App\Http\Controllers\frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Mail\RentConfirmMail;
use App\Mail\AdminConfirmMail;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rentals = Rental::where('user_id',Auth::user()->id)->where('status','Pending')->with('car')->latest('id')->paginate(5);
        return view('frontend.customer_dashboard.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($carId)
    {
        // $car = Car::findOrFail($carId);
        // return view('frontend.rentals.create', compact('car'));
    }//end method
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $car_id = $request->input('car_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (!Auth::check()) {
            // Store the previous URL in the session to redirect after login
            session()->put('previous_url', url()->previous());
            return redirect()->route('login');
        }

        //check if this car is available for selected date range
        if (!$this->isCarAvailable($car_id, $startDate, $endDate)) {
           // Toastr::error('Car is not available for the selected dates');
            return redirect()->back()->with('error', 'Sorry, this car is not available for the selected date range.');
        }

        //get days between two dates
        $days = ((strtotime($endDate) - strtotime($startDate)) / 86400) + 1;
        $car = Car::find($car_id);
        $total_price = $days * $car->daily_rent_price;

        $rental = new Rental();
        $rental->user_id = Auth::user()->id;
        $rental->car_id = $car_id;
        $rental->start_date = $startDate;
        $rental->end_date = $endDate;
        $rental->total_cost = $total_price;
        $rental->status = 'Pending';
        $rental->save();

        //send email to user
        $userName = Auth::user()->name;
        $userAll = Auth::user();

        $userMessage = [
            'id' => $userAll->id,
            'name' => $userName,
            'messageContent' => "You have booked a car for $days days from " . Carbon::parse($startDate)->format('d M, Y') . " to " . Carbon::parse($endDate)->format('d M, Y') . ".",
            'carName' => $car->name,
            'carBrand' => $car->brand,
            'carModel' => $car->model,
            'carType' => $car->car_type,
            'cost' =>  $total_price,
        ];

        $adminMessage = [
            'id' => $userAll->id,
            'customerName' => $userAll->name,
            'customerEmail' => $userAll->email,
            'customerPhone' => $userAll->phone,
            'name' => "Admin",
            'messageContent' => "$userName has booked a car for $days days from" . Carbon::parse($startDate)->format('d M, Y') . " to " . Carbon::parse($endDate)->format('d M, Y') . ".",
            'carName' => $car->name,
            'carBrand' => $car->brand,
            'carModel' => $car->model,
            'carType' => $car->car_type,
            'cost' =>  $total_price,
        ];

       // Mail::to(Auth::user()->email)->send(new RentConfirmMail($userMessage));
        //Mail::to('mazbaul20@gmail.com')->send(new AdminConfirmMail($adminMessage));

        return redirect()->route('customer.rentals')->with('success', 'Car booked Successfully');
    }

    private function isCarAvailable($carId, $startDate, $endDate, $rentalId = null)
    {
        $dateOverlap = Rental::where('car_id', $carId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->when($rentalId, function ($query) use ($rentalId) {
                $query->where('id', '!=', $rentalId); // বর্তমান রেন্টাল বাদ দিন
            })
            ->exists();

        return !$dateOverlap;
    }//end method

   

    public function isCarAvailablex($carId, $startDate, $endDate, $rentalId = null)
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


    public function CancelBooking(Request $request, Rental $rental)
    {
        if ($rental->user_id === $request->user()->id) {
            //Cancel a booking (only if the rental has not started yet).
            if ($rental->status == "Pending" && $rental->start_date > now()->format('Y-m-d')) {
                $rental->status = "Canceled";
                $rental->save();

                //Toastr::success('Rental canceled successfully');
                return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
            } elseif ($rental->status == "Canceled") {
                //Toastr::error('Booking already cenceled');
                return redirect()->back();
            }
           // Toastr::error('Sorry, this booking cannot be cancelled.');
            return redirect()->back()->with('error', 'Sorry, this booking cannot be cancelled.');
        } else {
            abort(403, 'You are not authorized to cancel this booking.');
        }
    }//end method
}
