<div class="sl-sideleft-menu">
    <a href="{{route('dashboard')}}" class="sl-menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    {{-- <a href="{{route('manage-city')}}" class="sl-menu-link {{ request()->is('cities*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Cities</span>
        </div>
    </a> --}}

    <a href="{{route('location.index')}}" class="sl-menu-link {{ request()->is('location*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-20"></i>
            <span class="menu-item-label">Locations</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    
    @can('viewAny',\App\Category::class)
    <a href="{{route('category.index')}}" class="sl-menu-link {{ request()->is('category*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> --}}
            <ion-icon name="list-outline"></ion-icon>
            <span class="menu-item-label">Categories</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    @endcan
    
    @can('viewAny',\App\Brand::class)
    <a href="{{route('brand.index')}}" class="sl-menu-link {{ request()->is('brand*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> --}}
            <ion-icon name="logo-amazon"></ion-icon>
            <span class="menu-item-label">Brands</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    @endcan
    
    @can('viewAny',\App\Product::class)
    <a href="{{route('product.index')}}" class="sl-menu-link {{ request()->is('product*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> --}}
            <ion-icon name="clipboard-outline"></ion-icon>
            <span class="menu-item-label">Products</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    @endcan
    

    @can('viewAny',\App\Order::class)
    <a href="{{route('order.manage')}}" class="sl-menu-link {{ request()->is('order*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-reorder-outline tx-20"></i> --}}
            <ion-icon name="reader-outline"></ion-icon>
            <span class="menu-item-label">Orders</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    @endcan
    

    @can('viewAny',\App\Service::class)
    <a href="{{route('service.index')}}" class="sl-menu-link {{ request()->is('service*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> --}}
            <ion-icon name="build-outline"></ion-icon>
            <span class="menu-item-label">Services</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    @endcan
    
    @can('viewAny',\App\Booking::class)
    <a href="{{route('booking.manage')}}" class="sl-menu-link {{ request()->is('booking*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            {{-- <i class="menu-item-icon icon ion-ios-calender-number-outline tx-20">Booking</i> --}}
            {{-- <span class="menu-item-label">Bookings</span> --}}
            {{-- <i class="fa fa-calendar" aria-hidden="true">Bookings</i> --}}
            <ion-icon name="calendar-number-outline"></ion-icon> 
            <span class="menu-item-label">Bookings</span> 

        </div><!-- menu-item -->
    </a><!-- sl-menu-link --> 
    @endcan
    
    @can('viewAny',\App\Technician::class)
    <a href="{{route('technician.manage')}}" class="sl-menu-link {{ request()->is('technician*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-people-outline tx-20"></i>
            <span class="menu-item-label">Technicians</span>
        </div><!-- menu-item -->
    </a>
    @endcan
    

    {{-- <a href="{{route('technician.jobs')}}" class="sl-menu-link {{ request()->is('job.*') ? 'active' : '' }}">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Jobs</span>
        </div>
    </a> --}}

    {{-- <a href="{{route('manage-chatbot')}}" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Chatbot</span>
        </div><!-- menu-item -->
    </a> --}}

    {{--<a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Categories</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{route('add-category')}}" class="nav-link">Add Category</a></li>
        <li class="nav-item"><a href="{{route('manage-category')}}" class="nav-link">Manage Category</a></li>
    </ul>--}}
</div><!-- sl-sideleft-menu -->