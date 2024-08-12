@extends('layouts.app')
@section('title', 'Edit Laboratorium')
@section('content')
    <h1 class="mb-3 text-gray-800 text-center">Edit Data Laboratorium</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Laboratorium</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('lab.update', $lab->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Gunakan method PUT untuk update data -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $lab->nama }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="harga" class="form-control" value="{{ $lab->harga }}"
                                    required>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                Simpan</button>
                            <a href="{{ route('lab.index') }}" class="btn btn-danger btn-sm"><i
                                    class="fas fa-reply"></i>
                                Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
