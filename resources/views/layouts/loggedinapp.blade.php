<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <!-- template CSS -->
        <link href="{{ URL::asset('assets/css/sb-admin.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Ponit Of Sale</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <!-- Navbar-->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary nav-link" href="#">POS</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                                Contacts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseContacts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('supplier.index') }}">Supplier</a>
                                     <a class="nav-link" href="{{ route('customer.index') }}">Customers</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                                    <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                                    <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                                    <a class="nav-link" href="{{ route('unit.index') }}">Units</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePurchase" aria-expanded="false" aria-controls="collapsePurchase">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                                Purchase
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePurchase" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('purchase.index') }}">All Purchase</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSells" aria-expanded="false" aria-controls="collapseSells">
                                <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                                Seles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSells" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('sale.index') }}">All Sales</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpenses" aria-expanded="false" aria-controls="collapseExpenses">
                                <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div>
                                Expenses
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseExpenses" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('expense.index') }}">Expence</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStock" aria-expanded="false" aria-controls="collapseStock">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Stock
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseStock" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/sale">All Stock</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-medical-alt"></i></div>
                                Report
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseReport" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Product</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlugins" aria-expanded="false" aria-controls="collapsePlugins">
                                <div class="sb-nav-link-icon icon-ratete-40"><i class="fas fa-plug"></i></div>
                                Plugins
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePlugins" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Product</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add New Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserMangment" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                User Mangment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUserMangment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                                    <a class="nav-link" href="{{ route('role.create') }}">Roles</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="userTable.php">Users</a>
                                     <a class="nav-link" href="rolesTable.php">Roles</a>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
			
				@yield('content')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('assets/js/sb-admin.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        {{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
        {{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('assets/demo/datatables-demo.js') }}"></script>
        
        @yield('script')
    
    </body>
</html>	