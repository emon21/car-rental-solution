<?php

namespace App\Http\Controllers\frontend;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{

    public function index(){
        $totalCars = Car::count();
        $availableCars = Car::where('availability', true)->count();
        $totalRentals = Rental::count();
        $totalEarnings = Rental::where('status', 'Completed')->sum('total_cost');
        $data = [
            'totalCars' => $totalCars,
            'availableCars' => $availableCars,
            'totalRentals' => $totalRentals,
            'totalEarnings' => $totalEarnings,
        ];

        return view('frontend.customer_dashboard.customer_dashboard', $data);


    }
    //
    public function RentalHistory(){

        $rentals = Rental::where('user_id', Auth::user()->id)->where('status', '!=', 'Pending')->with('car')->paginate(5);
        return view('frontend.customer_dashboard.rentals.rental-history', compact('rentals'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
