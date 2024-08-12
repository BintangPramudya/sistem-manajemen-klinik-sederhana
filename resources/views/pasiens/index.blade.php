@extends('layouts.app')
@section('title', 'Data Pasien')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pasien</h1>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            @if (session('message'))
                swal("Sukses!", "{{ session('message') }}", "success");
            @endif
        </script>

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
            </div>
            <div class="card-body">
                <a href="{{ url('/tambahdata') }}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah
                    Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Pasien</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                @if (auth()->user()->role != 'pasien')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Pasien</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                @if (auth()->user()->role != 'pasien')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                                <tr>
                                    <td>{{ $pasien->kode_pasien }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->jenis_kelamin }}</td>
                                    <td>{{ $pasien->usia }} Tahun</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->telepon }}</td>
                                    @if (auth()->user()->role != 'pasien')
                                        <td>
                                            {{-- show --}}
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('pasien.show', $pasien->id) }}"><i
                                                    class="fas fa-fw fa-eye"></i></a>
                                            {{-- edit --}}
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('pasien.edit', $pasien->id) }}"><i
                                                    class="fas fa-fw fa-pen"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
