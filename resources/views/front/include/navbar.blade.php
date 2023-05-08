<nav class="main-nav">
    <ul>
        <li class="dropdown-holder active"><a href="{{ route('/') }}">Home</a>
        </li>
        <li><a href="#">Categories</a>
            <ul class="hm-dropdown hm-sub_dropdown">
                @foreach ($categories as $category)
                <li><a href="{{ route('category-products', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                </li>
                @endforeach
        </li>
    </ul>
    </li>
    <li class=""><a href="{{ route('client.book-service') }}">Book a Service</a>
    </li>
    @guest
    <li class=""><a href="{{ route('login') }}">Login</a></li>
    @else
    {{-- <li class=""><a href="{{ Auth::user()->role_id == 2 ? route('home') : route('dashboard') }}">Dashboard</a></li> --}}
    <li><a href="#">{{Auth::user()->name}}</a>
        <ul class="hm-dropdown hm-sub_dropdown">
            <li class=""><a href="{{ Auth::user()->role_id == 2 ? route('home') : route('dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                </form>
            </li>

    </li>
    @endguest
    </ul>
</nav>