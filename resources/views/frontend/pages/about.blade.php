@extends('frontend.layout.app')
@section('content')
    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4">About Us</h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x400" class="img-fluid" alt="About Us Image">
                </div>
                <div class="col-md-6">
                    <h2>Who We Are</h2>
                    <p>
                        Car Rental is a leading car rental company with a mission to provide reliable and affordable rental
                        cars for your personal and business needs.
                        We have a wide range of vehicles, from economy cars to luxury SUVs, to suit every occasion.
                    </p>
                    <p>
                        Our team is committed to providing exceptional customer service and ensuring that your rental
                        experience is hassle-free and enjoyable.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>
                        To provide the best car rental services with the highest levels of customer satisfaction, ensuring a
                        safe, reliable, and comfortable journey for our customers.
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Our Vision</h2>
                    <p>
                        To become the most trusted and preferred car rental company in the country, offering affordable and
                        quality vehicles for every journey.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-text">Operations Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Mike Johnson</h5>
                            <p class="card-text">Customer Support Lead</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
