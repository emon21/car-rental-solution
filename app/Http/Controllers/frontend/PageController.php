<?php

namespace App\Http\Controllers\frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function Home(){

        
        $cars = Car::where('availability', 1)->latest()->get();
        return view('frontend.pages.home', compact('cars'));

    }

    public function About(){
        return view('frontend.pages.about');
    }

    public function Contact(){
        return view('frontend.pages.contact');

    }

    public function Rental(Request $request){

        $cars = Car::query()
            ->where('availability', 1)
            ->when($request->car_type, function ($query, $carType) {
                return $query->where('car_type', $carType);
            })

            ->when($request->brand, function ($query, $brand) {
                return $query->where('brand', $brand);
            })

            ->when($request->daily_rent, function ($query, $dailyRent) {
                return $query->where('daily_rent_price', '<=', $dailyRent); // Less than or equal to daily rent

            })
            
            // ->when($request->daily_rent, function ($query, $dailyRent) {
            //     return $query->whereBetween('daily_rent_price', [$dailyRent, $dailyRent]); // Less than or equal to daily rent

            // })
            ->latest()->get();

        $carTypes = Car::pluck('car_type')->unique()->toArray();

        $brands = Car::pluck('brand')->unique()->toArray();
        
        // $carsPrice = Car::pluck('daily_rent_price')->unique()->toArray();
        // $carsPrice = Car::whereBetween('daily_rent_price', [1,5])
        // // ->orWhereBetween('daily_rent_price', [$request->daily_rent, $request->daily_rent])
        // ->get();

        // return $cars;

        // return $carsPrice = Car::where('daily_rent_price', 'BETWEEN', 0,'AND',100)->get();
        
        return view('frontend.pages.rentals', compact('cars', 'carTypes', 'brands'));
   

    }

    public function Cars(){
   
        $cars = Car::latest()->paginate(6);
        return view('frontend.pages.car', compact('cars'));
    } 
    
    public function Details($id){
        $car = Car::find($id);
        return view('frontend.pages.carDetails', compact('car'));
    }


}
