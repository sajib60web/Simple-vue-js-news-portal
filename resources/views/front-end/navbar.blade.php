<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/')}}">Logo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                $categories = DB::table('categories')->where('publication_status', 1)->get();
                foreach ($categories as $category) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category-blog',['id'=>$category->id,'name'=>$category->category_name])}}">{{ $category->category_name }}</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about-us') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('service') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                @if(Session::get('visitor_id'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Session::get('visitorName') }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item"  href="{{ route('visitor-logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('visitorLogoutForm').submit();">
                            {{ __('Logout') }}</a>
                        <form id="visitorLogoutForm" action="{{ route('visitor-logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('visitor-login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('singUp')}}">SingUp</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

