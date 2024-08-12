    @extends('layouts.app')
    @section('title', 'Tambah User')
    @section('content')
        <h1 class="mb-3 text-gray-800 text-center">Tambah User</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" class="form-control"
                                    placeholder="Masukkan konfirmasi password">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                    Simpan</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm"><i
                                        class="fas fa-reply"></i>
                                    Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection
