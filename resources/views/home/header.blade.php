@if (Session::has('success'))
<div class="alert alert-success" >{{Session::get('success')}}</div>
@endif
<div class="header">
<div class="container">
    <div class="row">
        <div class="col-xl- col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
            <div class="center-desk">
                <div class="logo">
                    <a href="#"><h2><b><i>BookNStay</i></b></h2></a>
                    {{-- <img src="images/logo.png" alt="#" /> --}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navigation navbar navbar-expand-md navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rooms">Our room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    {{-- <li class="nav-item" style="padding-right: 10px">
                        <a class="btn btn-success" href="{{route('account.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('account.register')}}">Register</a>
                    </li> --}}
                </ul>
                @if(Auth::check())
                <!-- If the user is logged in, show the dropdown menu -->
                <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::User()->name}}</a>
                    <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">                          
                        <li>
                            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('account.logout')}}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @else
                <!-- If the user is not logged in, show the login button -->
                <li class="nav-item" style="padding-right: 10px">
                    <a class="btn btn-success" href="{{route('account.login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{route('account.register')}}">Register</a>
                </li>
            @endif
                {{-- <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::User()->name}}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">                          
                            <li>
                                <a class="dropdown-item" href="{{route('account.logout')}}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul> --}}
            </div>
            {{-- <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::User()->name}}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">                          
                            <li>
                                <a class="dropdown-item" href="{{route('account.logout')}}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> --}}
            </nav>
        </div>
    </div>
</div>
</div>