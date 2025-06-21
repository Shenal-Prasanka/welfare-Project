<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <!-- Additional styles -->
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav"></ul>
        <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="nav-icon fas fa-user-circle"></i> {{ Auth::user()->name }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li>
            <a href="{{ route('profile.show') }}" class="dropdown-item border-0 bg-transparent w-100 text-start">
                <i class="me-2 fas fa-file"></i> {{ __('My profile') }}
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item border-0 bg-transparent w-100 text-start">
                    <i class="me-2 fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                </button>
            </form>
        </li>
    </ul>
</li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <img src="{{ asset('/public/images/AdminLTELogo.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Welfareshop</span>
        </a>
        <div class="px-2 mt-2">
            @include('layouts.navigation')
        </div>
    </aside>
    <!-- /.sidebar -->

    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <!-- Footer     
    <footer class="main-footer bg-dark text-center">
        <strong>Copyright &copy; 2025 Derectorate of Information Technology.</strong>
        All rights reserved.
    </footer>-->
</div>

<!-- REQUIRED SCRIPTS -->

<!-- Laravel Mix / Vite Scripts -->
@vite('resources/js/app.js')

<!-- AdminLTE -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
@yield('scripts')

</body>
</html>
