@extends('layouts.app')
@section('title', 'Edit Dokter')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Edit Dokter</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Dokter</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kode Dokter</label>
                            <input type="text" name="kode_dokter" class="form-control"
                                value="{{ $dokter->kode_dokter }}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" name="spesialis" class="form-control" value="{{ $dokter->spesialis }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $dokter->status == 'Praktek' ? 'selected' : '' }}>Praktek</option>
                                <option value="0" {{ $dokter->status == 'Tidak Praktek' ? 'selected' : '' }}>Tidak
                                    Praktek</option>
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
