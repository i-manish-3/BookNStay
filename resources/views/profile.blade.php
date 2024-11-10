<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>Profile</title>
<style>
body {
    background: white;
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
</head>
@include('home.css')
<body>
    <header>
<div class="header">
<div class="container">
    <div class="row">
        <div class="col-xl- col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
            <div class="center-desk">
                <div class="logo">
                    <a href="{{route('account.dashboard')}}"><h2><b><i>BookNStay</i></b></h2></a>
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
            @if(Auth::check())
                <!-- If the user is logged in, show the dropdown menu -->
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
            @endif
            </div>
            </nav>
        </div>
    </div>
</div>
</div>
</header>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ Auth::User()->image ? asset('storage/images/' . Auth::User()->image) : asset('storage/images/default_profile.jpg') }}">
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                @if (Session::has('success'))
                    <div class="alert alert-success" >{{Session::get('success')}}</div>
                @endif
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <label for="image" class="form-label">Profile Photo : </label>
                     <input type="file" name="image" class="form-control">
                    <div class="row mt-2">
                        <label for="password" class="form-label">Full Name : </label><input type="text" class="form-control" placeholder="name" name="name" value="{{Auth::User()->name}}">
                    </div>
                    <div class="row mt-3">
                        <label for="password" class="form-label">Email : </label><input type="text" class="form-control" placeholder="enter email id" name="email" value="{{Auth::User()->email}}" readonly>
                    </div>
                    <div class="row mt-3">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button"  type="submit">Save Profile</button></div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


				                
