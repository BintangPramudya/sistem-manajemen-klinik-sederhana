@extends('layouts.app')
@section('title', 'Edit Obat')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Edit Obat</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Obat</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Gunakan method PUT untuk update data -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $obat->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Tablet" {{ $obat->jenis == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                                <option value="Kapsul" {{ $obat->jenis == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                                <option value="Sirup" {{ $obat->jenis == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dosis</label>
                            <input type="text" name="dosis" class="form-control" value="{{ $obat->dosis }}" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="harga" class="form-control" value="{{ $obat->harga }}"
                                    required>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                Simpan</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-reply"></i>
                                Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
