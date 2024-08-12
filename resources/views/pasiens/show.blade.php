@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Pasien</h1>

        <!-- Detail Rekam Medis -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pasien {{ $pasien->nama }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p><strong>Kode Pasien:</strong> {{ $pasien->kode_pasien }}</p>
                                <p><strong>Nama Pasien:</strong> {{ $pasien->nama }}</p>
                                <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</p>
                                <p><strong>Umur:</strong> {{ $pasien->usia }}</p>
                                <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
                                <p><strong>Telepon:</strong> {{ $pasien->telepon }}</p>
                                <a href="{{ route('pasien.index') }}" class="btn btn-danger btn-sm"><i
                                    class="fas fa-reply"></i>
                                Kembali</a>
                            </div>
                        </div>
                    </div>
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
