@extends('layouts.app')
@section('title', 'Tambah Dokter')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Tambah Dokter</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Dokter</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Dokter</label>
                            <input type="text" name="kode_dokter" class="form-control"
                                placeholder="Masukkan kode dokter">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" name="spesialis" class="form-control" placeholder="Masukkan spesialis">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Praktek</option>
                                <option value="0">Tidak Praktek</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                Simpan</button>
                            <a href="{{ route('dokter.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-reply"></i>
                                Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
