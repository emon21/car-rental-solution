<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Car Rental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.cars') }}">Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.rentals') }}">Rentals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="btn btn-success" href="{{ url('customer/dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn btn-success" href="{{ url('/login') }}">Login</a>
                        <a class="btn btn-primary" href="{{ url('/register') }}">Signup</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
