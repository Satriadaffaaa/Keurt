<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!-- resources/views/component/sidebar.blade.php -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="transaction-page" class="brand-link">
        <!-- <img src="asset/krt.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <div class="text-center">
            <img src="asset/krt-sidebar.png" alt="" style="width: 50px;">
        </div>
        <!-- <span class="brand-text font-weight-light">KRT</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-5 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-circle fa-2x"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/transaction-page" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/payment-page" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="comment-page" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Forum
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout(event);"
                        class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    function confirmLogout(event) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari akun Anda.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>