@extends('layouts.app')
@section('title', 'Edit Pasien')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Edit Pasien</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Pasien</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kode Pasien</label>
                            <input type="text" name="kode_pasien" class="form-control" value="{{ $pasien->kode_pasien }}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Usia</label>
                            <input type="text" name="usia" class="form-control" value="{{ $pasien->usia }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $pasien->alamat }}">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $pasien->telepon }}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('pasien.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-reply"></i> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
