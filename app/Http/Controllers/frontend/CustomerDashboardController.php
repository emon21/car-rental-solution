<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
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
