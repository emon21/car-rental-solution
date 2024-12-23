<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function Home(){
        return view('frontend.pages.home');

    }

    public function About(){
        return view('frontend.pages.about');
    }

    public function Contact(){
        return view('frontend.pages.contact');

    }

    public function Rental(){
        return view('frontend.pages.rentals');

    }

    public function Details($id){}


}
