<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Home</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            @php
                $id = Auth::user()->id;
                $user = App\Models\User::whereId($id)->first();
            @endphp
            <div class="ms-3">
                <h6 class="mb-0">{{ $user->name }}</h6>
                <span>Dashboard</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            
            <a href="{{ url('customer/dashboard') }}"
                class="nav-link {{ Request::is('customer/dashboard*') ? 'active' : '' }}"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <a href="{{ route('customer.rentals') }}"
                class="nav-link {{ Request::is('customer/rental') ? 'active' : '' }}"><i
                    class="far fa-file-alt me-2"></i>Rentals</a>

            <a href="{{ route('customer.rentals.history') }}"
                class="nav-link {{ Request::is('customer/rental') ? 'active' : '' }}"><i
                    class="far fa-file-alt me-2"></i>Rental History</a>

        </div>
    </nav>
</div>
