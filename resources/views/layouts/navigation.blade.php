<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            @php
                $roles = [
                    0 => 'User',
                    1 => 'Admin',
                    2 => 'Unit-clerk',
                    3 => 'Unit-OC',
                    4 => 'Shop-Coord-Clerk',
                    5 => 'Shop-Coord-OC',
                    6 => 'Welfare-Shop-Clerk',
                    7 => 'Welfare-Shop-OC',
                    8 => 'Ledger-Clerk',
                    9 => 'Ledger-OC',
                ];
            @endphp
            <a href="#" class="d-block">{{ $roles[Auth::user()->role] ?? 'Unknown Role' }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard Menu -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th text-pink"></i>
                    <p class="text-white">{{ __('Dashboard Menu') }}</p>
                </a>
            </li>

            <!-- Master Data Dropdown (Visible only for user with role=1) -->
            @if(Auth::user()->role == 1)
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database text-blue"></i>
                    <p class="text-white">
                        {{ __('Master Data') }}
                        <i class="right fas fa-angle-left text-blue"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <!-- User Management -->
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link">
                           <i class="bi bi-person-workspace nav-icon text-success"></i>
                            <p>{{ __('User Management') }}</p>
                        </a>
                    </li>

                    <!-- Rank Management -->
                    <li class="nav-item">
                        <a href="{{ route('rank') }}" class="nav-link">
                            <i class="bi bi-bookmark-star-fill nav-icon text-yellow"></i>
                            <p>{{ __('Rank Management') }}</p>
                        </a>
                    </li>
                
                    <!-- Welfare Management -->
                    <li class="nav-item">
                        <a href="{{ route('welfare') }}" class="nav-link">
                            <i class="bi bi-bag-check-fill nav-icon text-blue"></i>
                            <p>{{ __('Welfare Management') }}</p>
                        </a>
                    </li>

                    <!-- Regement Management -->
                    <li class="nav-item">
                        <a href="{{ route('regement') }}" class="nav-link">
                            <i class="bi bi-star-half nav-icon text-orange"></i>
                            <p>{{ __('Regement Management') }}</p>
                        </a>
                    </li>

                    <!-- Unit Management -->
                    <li class="nav-item">
                        <a href="{{ route('unit') }}" class="nav-link">
                            <i class="bi bi-buildings-fill nav-icon text-red"></i>
                            <p>{{ __('Unit Management') }}</p>
                        </a>
                    </li>
                    
                     <!-- Category Management -->
                    <li class="nav-item">
                        <a href="{{ route('category') }}" class="nav-link">
                            <i class="bi bi-tag-fill nav-icon text-success"></i>
                            <p>{{ __('Category Management') }}</p>
                        </a>
                    </li>

                     <!-- Supply Management -->
                    <li class="nav-item">
                        <a href="{{ route('supply') }}" class="nav-link">
                            <i class="bi bi-truck nav-icon text-blue"></i>
                            <p>{{ __('Supply Management') }}</p>
                        </a>
                    </li>

                     <!-- Item Management -->
                    <li class="nav-item">
                        <a href="{{ route('item') }}" class="nav-link">
                            <i class="bi bi-backpack nav-icon text-yellow"></i>
                            <p>{{ __('Item Management') }}</p>
                        </a>
                    </li>
                    
                     <!-- Product Management -->
                    <li class="nav-item">
                        <a href="{{ route('product') }}" class="nav-link">
                            <i class="bi bi-pc-display-horizontal nav-icon text-red"></i>
                            <p>{{ __('Product Management') }}</p>
                        </a>
                    </li>

                </ul>
            </li>
            @endif
        </ul>
    </nav>
</div>
<!-- /.sidebar -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- AdminLTE CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

<!-- Initialize sidebar -->
<script>
$(document).ready(function() {
    // Initialize the sidebar treeview
    $('[data-widget="treeview"]').Treeview('init');
    
     //Alternatively, you can use this if the above doesn't work
     $('[data-widget="treeview"]').each(function() {
         $(this).treeview();
     });
});
</script>