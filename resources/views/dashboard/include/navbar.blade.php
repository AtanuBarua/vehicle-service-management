<nav class="nav">
    <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            {{--<span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>--}}
            {{-- <span class="logged-name">{{ Auth::guard('admin')->user()->name }}</span> --}}
            <span class="logged-name">{{ Auth::user()->name }}</span>
            <img src="{{asset('/')}}admin/assets/img/img3.jpg" class="wd-32 rounded-circle" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
                {{--<li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>--}}
                <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();"><i class="icon ion-power"></i> Sign Out</a>
                    <form id="logoutForm" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
</nav>