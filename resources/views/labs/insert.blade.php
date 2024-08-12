@extends('layouts.app')
@section('title', 'Tambah Obat')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Tambah Data Laboratorium</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Laboratoirum</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('lab.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="harga" class="form-control" required placeholder="Masukkan harga">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                Simpan</button>
                            <a href="{{ route('lab.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-reply"></i>
                                Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

