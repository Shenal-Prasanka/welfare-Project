<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Navbar -->
<nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
       <li>
                <a href="{{ route('profile.show') }}" class="">
                    {{ __('My profile') }}
                </a>
            </li>
    </ul>
   
    <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
           <i class="nav-icon fas fa-user-circle"></i> {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <!--<li>
                <a href="{{ route('profile.show') }}" class="dropdown-item">
                    <i class="mr-2 fas fa-file"></i>
                    {{ __('My profile') }}
                </a>
            </li>-->
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </li>
</ul>
</nav>
    <!-- /.navbar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@vite('resources/js/app.js')
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

@yield('scripts')

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
