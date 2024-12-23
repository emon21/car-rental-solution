<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Admin</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('car.index') }}" class="nav-link {{ Request::is('admin/car*') ? 'active' : '' }}"><i class="far fa-file-alt me-2"></i>Car</a>
            <a href="{{ route('rental.index') }}" class="nav-link {{ Request::is('admin/rental') ? 'active' : '' }}"><i class="far fa-file-alt me-2"></i>Rentals</a>
            <a href="{{ route('customer.index') }}" class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}"><i class="far fa-file-alt me-2"></i>Customers</a>
        </div>
    </nav>
</div>
