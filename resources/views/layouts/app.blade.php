<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/') }}template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('/') }}template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Memuat SweetAlert dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->


            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="#">
                <i class="fas fa-clinic-medical mr-2" style="font-size: 1.5em;"></i>
                <div class="sidebar-brand-text mx-3">ANNUR CARE <sup>klinik</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if (auth()->user()->role == 'dokter' || auth()->user()->role == 'admin' ||  auth()->user()->role == 'pasien')
                <!-- Nav Item - Pasien -->
                <li class="nav-item {{ Request::is('pasien*') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('pasien*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#pasien"
                        aria-expanded="{{ Request::is('pasien*') ? 'true' : 'false' }}" aria-controls="pasien">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>Pasien</span>
                    </a>
                    <!-- Submenu -->
                    <div id="pasien" class="collapse {{ Request::is('pasien*') ? 'show' : '' }}"
                        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Request::is('pasien') ? 'active' : '' }}"
                                href="{{ url('/pasien') }}">Data Pasien</a>
                            <a class="collapse-item {{ Request::is('tambahdata') ? 'active' : '' }}"
                                href="{{ url('/tambahdata') }}">Tambah Data</a>
                        </div>
                    </div>
                </li>
                @endif

                @if (auth()->user()->role == 'laboran' || auth()->user()->role == 'admin')
                <!-- Nav Item - Labs -->
                <li class="nav-item {{ Request::is('lab*') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('lab*') ? 'active' : '' }}" href="#" data-toggle="collapse"
                        data-target="#lab" aria-expanded="{{ Request::is('lab*') ? 'true' : 'false' }}"
                        aria-controls="lab">
                        <i class="fas fa-fw fa-flask"></i>
                        <span>Labs</span>
                    </a>
                    <!-- Submenu -->
                    <div id="lab" class="collapse {{ Request::is('lab*') ? 'show' : '' }}"
                        aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Request::is('lab') ? 'active' : '' }}"
                                href="{{ url('/lab') }}">Data Lab</a>
                            <a class="collapse-item {{ Request::is('lab/create') ? 'active' : '' }}"
                                href="{{ route('lab.create') }}">Tambah Data</a>
                        </div>
                    </div>
                </li>
                @endif

                @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'admin')
                <!-- Nav Item - Obat -->
                <li class="nav-item {{ Request::is('obat*') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('obat*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#obat"
                        aria-expanded="{{ Request::is('obat*') ? 'true' : 'false' }}" aria-controls="obat">
                        <i class="fas fa-fw fa-pills"></i>
                        <span>Obat</span>
                    </a>
                    <!-- Submenu -->
                    <div id="obat" class="collapse {{ Request::is('obat*') ? 'show' : '' }}"
                        aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Request::is('obat') ? 'active' : '' }}"
                                href="{{ url('/obat') }}">Stok Obat</a>
                            <a class="collapse-item {{ Request::is('tambah-data-obat') ? 'active' : '' }}"
                                href="{{ url('/tambah-data-obat') }}">Tambah Data</a>
                        </div>
                    </div>
                </li>
                @endif

                        
                <!-- Nav Item - Dokter -->
                <li class="nav-item {{ Request::is('dokter*') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('dokter*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#dokter"
                        aria-expanded="{{ Request::is('dokter*') ? 'true' : 'false' }}" aria-controls="dokter">
                        <i class="fas fa-fw fa-user-nurse"></i>
                        <span>Dokter</span>
                    </a>
                    <!-- Submenu -->
                    <div id="dokter" class="collapse {{ Request::is('dokter*') ? 'show' : '' }}"
                        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Request::is('dokter') ? 'active' : '' }}"
                                href="{{ url('/dokter') }}">Dokter</a>
                            <a class="collapse-item {{ Request::is('dokter/create') ? 'active' : '' }}"
                                href="{{ route('dokter.create') }}">Tambah Data</a>
                        </div>
                    </div>
                </li>
                @endif
                @if (auth()->user()->role == 'dokter' || auth()->user()->role == 'admin')
                <!-- Nav Item - Rekam Medis -->
                <li class="nav-item {{ Request::is('rekam-medis*') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('rekam-medis*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#remik"
                        aria-expanded="{{ Request::is('rekam-medis*') ? 'true' : 'false' }}" aria-controls="remik">
                        <i class="fas fa-fw fa-flask"></i>
                        <span>Rekam Medis</span>
                    </a>
                    <!-- Submenu -->
                    <div id="remik" class="collapse {{ Request::is('rekam-medis*') ? 'show' : '' }}"
                        aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Request::is('rekam-medis') ? 'active' : '' }}"
                                href="{{ route('rekam-medis.index') }}">Data Rekam Medis</a>
                            <a class="collapse-item {{ Request::is('rekam-medis/create') ? 'active' : '' }}"
                                href="{{ route('rekam-medis.create') }}">Tambah Data</a>
                        </div>
                    </div>
                </li>
                @endif
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if (auth()->user()->role == 'admin')
            <!-- Nav Item - User -->
            <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="#" data-toggle="collapse"
                    data-target="#user" aria-expanded="{{ Request::is('user*') ? 'true' : 'false' }}"
                    aria-controls="user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span>
                </a>
                <!-- Submenu -->
                <div id="user" class="collapse {{ Request::is('user*') ? 'show' : '' }}"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('user') ? 'active' : '' }}"
                            href="{{ url('user') }}">Data
                            User</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span>Welcome </span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        @yield('alerts')

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('template/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profil.index') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- End of Main Content -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('/') }}template/vendor/jquery/jquery.min.js"></script>
                <script src="{{ asset('/') }}template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('/') }}template/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('/') }}template/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="{{ asset('/') }}template/vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="{{ asset('/') }}template/js/demo/chart-area-demo.js"></script>
                <script src="{{ asset('/') }}template/js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="{{ asset('/') }}template/vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="{{ asset('/') }}template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="{{ asset('/') }}template/js/demo/datatables-demo.js"></script>



                <script>
                    // Menangkap event submit form
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('form').addEventListener('submit', function(e) {
                            e.preventDefault(); // Menghentikan pengiriman form

                            // Tampilkan SweetAlert
                            Swal.fire({
                                title: 'Anda yakin?',
                                text: "Data obat akan disimpan!",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Simpan!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Jika pengguna menekan Ya, lanjutkan dengan pengiriman form
                                    this.submit();
                                }
                            });
                        });
                    });
                </script>

</body>


</html>
