<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard Menu -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <p class="text-white">
                        <i class="nav-icon fas fa-th text-pink"></i> {{ __('Dashboard Menu') }}
                    </p>
                </a>
            </li>

            <!-- User Management Section (Visible only for user with id=3) -->
            @if(Auth::user()->role == 1)
                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-user text-green"></i>
                        <p class="text-white">
                            {{ __('User Management') }}
                        </p>
                    </a>
                </li>


                <!-- Rank Section -->
                <li class="nav-item">
                    <a href="{{ route('rank') }}" class="nav-link">
                        <i class="nav-icon fas fa-bookmark text-yellow"></i>
                        <p class="text-white">{{ __('Rank Management') }}</p>
                    </a>
                </li>
            

            <!-- Welfare Section -->
            <li class="nav-item">
                <a href="{{ route('welfare') }}" class="nav-link">
                    <i class="nav-icon fas fa-home text-blue"></i>
                    <p class="text-white">
                        {{ __('Welfare Management') }}
                    </p>
                </a>
            </li>
              <!-- Regement Section -->
            <li class="nav-item">
                <a href="{{ route('regement') }}" class="nav-link">
                    <i class="nav-icon fas fa-star text-yellow"></i>
                    <p class="text-white">
                        {{ __('Regement Management') }}
                    </p>
                </a>
            </li>

             <!-- Unit Section -->
            <li class="nav-item">
                <a href="{{ route('unit') }}" class="nav-link">
                    <i class="nav-icon fas fa-building text-red"></i>
                    <p class="text-white">
                        {{ __('Unit Management') }}
                    </p>
                </a>
            </li>
        @endif
        </ul>
    </nav>
    <!-- Sidebar Menu -->
</div>
<!-- /.sidebar -->