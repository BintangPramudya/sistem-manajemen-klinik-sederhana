@extends('layouts.app')

@section('title', 'Tambah Data Rekam Medis')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Rekam Medis</h1>

        <!-- Form Tambah Data Rekam Medis -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Rekam Medis</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('rekam-medis.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_rm">No RM</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                    </div>
                    <div class="form-group">
                        <label for="pasien_id">Nama Pasien</label>
                        <select class="form-control" id="pasien_id" name="pasien_id" required>
                            <option value="">Pilih Pasien</option>
                            @foreach ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lab_id">Laboratorium</label>
                        <select class="form-control" id="lab_id" name="lab_id" required>
                            <option value="">Pilih Laboratorium</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obat_id">Obat</label>
                        <select class="form-control" id="obat_id" name="obat_id" required>
                            <option value="">Pilih Obat</option>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select class="form-control" id="dokter_id" name="dokter_id" required>
                            <option value="">Pilih Dokter</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
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
