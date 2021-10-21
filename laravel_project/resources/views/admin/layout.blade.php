<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('admin_asset/css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .ACTIVE {
            border-left: 3px solid red;
            padding-left: 3rem;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">LARAVEL PROJECT</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 flex-grow-1 d-flex justify-content-end align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">ADMIN</div>
                        <a class="nav-link {{ request()->is('admin') ? 'active ACTIVE' : '' }}" href="/admin">

                            Dashboard
                        </a>
                        <a class="nav-link {{ request()->is('admin/field*') ? 'active ACTIVE' : '' }}" href="/admin/field">

                            Field
                        </a>
                        <a class="nav-link {{ request()->is('admin/brand*') ? 'active ACTIVE' : '' }}" href="/admin/brand">

                            Brand
                        </a>
                        <a class="nav-link {{ request()->is('admin/product*') ? 'active ACTIVE' : '' }}" href="/admin/product">

                            Product
                        </a>
                        <a class="nav-link {{ request()->is('admin/user*') ? 'active ACTIVE' : '' }}" href="/admin/user">

                            User
                        </a>
                        <a class="nav-link {{ request()->is('admin/order*') ? 'active ACTIVE' : '' }}" href="/admin/order">
                            Order
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="p-5">
                {{ $slot }}
            </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin_asset/js/scripts.js')}}"></script>

    <!-- <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script> -->
    <!-- <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script> -->

</body>

</html>