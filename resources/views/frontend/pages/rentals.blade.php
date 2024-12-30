@extends('frontend.layout.app')
<style>
    // doesnt work funnly on firefox or edge, need to fix

    .rangeValues {
        display: block;
    }

    .range-slider {
        width: 300px;
        text-align: center;
        position: relative;
        margin-top: -14px;
    }

    input[type=range] {
        -webkit-appearance: none;
        border: 1px solid white;
        width: 300px;
        position: absolute;
        top: 40px;
        right: 10px;
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 300px;
        height: 5px;
        background: #ddd;
        border: none;
        border-radius: 3px;

    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #21c1ff;
        margin-top: -4px;
        cursor: pointer;
        position: relative;
        z-index: 1;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #0f82ce;
    }

    input[type=range]::-moz-range-track {
        width: 300px;
        height: 5px;
        background: #740404;
        border: none;
        border-radius: 3px;
    }

    input[type=range]::-moz-range-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #21c1ff;

    }


    /*hide the outline behind the border*/

    input[type=range]:-moz-focusring {
        outline: 1px solid white;
        outline-offset: -1px;
    }

    input[type=range]::-ms-track {
        width: 300px;
        height: 5px;
        /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
        background: transparent;
        /*leave room for the larger thumb to overflow with a transparent border */
        border-color: transparent;
        border-width: 6px 0;
        /*remove default tick marks*/
        color: transparent;
        z-index: -4;

    }

    input[type=range]::-ms-fill-lower {
        background: #777;
        border-radius: 10px;
    }

    input[type=range]::-ms-fill-upper {
        background: #ddd;
        border-radius: 10px;
    }

    input[type=range]::-ms-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #21c1ff;
    }

    input[type=range]:focus::-ms-fill-lower {
        background: #888;
    }

    input[type=range]:focus::-ms-fill-upper {
        background: #ccc;
    }
</style>
@section('content')
    <!-- Rentals Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4">Available Cars for Rent</h1>

            <!-- Filter Section -->
            <form id="filterForm" method="GET" action="{{ route('frontend.rentals') }}">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <select class="form-select" name="car_type" aria-label="Filter by Car Type" onchange="applyFilter()">
                            <option value="" selected disabled>Filter by Car Type</option>
                            <option value="" selected>All Car</option>
                            @foreach ($carTypes as $type)
                                <option value="{{ $type }}" {{ request('car_type') == $type ? 'selected' : '' }}>
                                    {{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="brand" aria-label="Filter by Brand" onchange="applyFilter()">
                            <option selected disabled>Filter by Brand</option>
                            <option value="" selected>All Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                    {{ $brand }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="form-control" name="daily_rent" placeholder="Max Daily Rent price" value="{{ request('daily_rent') }}" onchange="applyFilter()">

                            {{-- <input value="{{ request('daily_rent') }}" name="daily_rent" min="0" max="50000" step="500" type="range" onchange="applyFilter()">

                                <input value="{{ request('daily_rent') }}" name="daily_rent" min="0" max="50000" step="500" type="range" onchange="applyFilter()"> --}}

                            {{-- <div id="slider"></div> --}}
                            {{-- {{ $cars->name }} --}}
                            {{-- <div class="range-slider">
                                <span class="rangeValues"></span>
                                <input value="{{ request('daily_rent') }}" name="daily_rent" min="" max="50000" step="500" type="range" onchange="applyFilter()">
                                <input value="{{ request('daily_rent') }}" name="daily_rent" min="0" max="50000" step="500" type="range" onchange="applyFilter()">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </form>
            <!-- Car Listing -->
            <div class="row">

                {{-- @foreach($cars as $item)
                 <p class="card-text">Daily Rent: ${{ $item->daily_rent_price }}</p>
                @endforeach --}}
                <!-- Car 1 -->
                @forelse ($cars as $car)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ url($car->image) ?? asset('images/no_image.jpg') }}" class="card-img-top"
                                alt="Car Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="card-text">Brand: {{ $car->brand }} | Type: {{ $car->car_type }} | Year:
                                    {{ $car->year }}</p>
                                <p class="card-text">Daily Rent: ${{ $car->daily_rent_price }}</p>
                                <a href="{{ route('car.details', $car->id) }}" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <span class="text-danger">No Car</span>
                @endforelse

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        function applyFilter() {
            document.getElementById('filterForm').submit();
        }

        //-----JS for Price Range slider-----

        function getVals() {
            // Get slider values
            let parent = this.parentNode;
            let slides = parent.getElementsByTagName("input");
            let slide1 = parseFloat(slides[0].value);
            let slide2 = parseFloat(slides[1].value);
            // Neither slider will clip the other, so make sure we determine which is larger
            if (slide1 > slide2) {
                let tmp = slide2;
                slide2 = slide1;
                slide1 = tmp;
            }

            let displayElement = parent.getElementsByClassName("rangeValues")[0];
            displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
        }

        window.onload = function() {
            // Initialize Sliders
            let sliderSections = document.getElementsByClassName("range-slider");
            for (let x = 0; x < sliderSections.length; x++) {
                let sliders = sliderSections[x].getElementsByTagName("input");
                for (let y = 0; y < sliders.length; y++) {
                    if (sliders[y].type === "range") {
                        sliders[y].oninput = getVals;
                        // Manually trigger event first time to display values
                        sliders[y].oninput();
                    }
                }
            }
        }
    </script>
@endsection
