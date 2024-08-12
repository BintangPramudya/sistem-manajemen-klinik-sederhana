    @extends('layouts.app')
    @section('title', 'Tambah Pasien')
    @section('content')
        <h1 class="mb-3 text-gray-800 text-center">Tambah Pasien</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pasien</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pasien.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode Pasien</label>
                                <input type="text" name="kode_pasien" class="form-control"
                                    placeholder="Masukkan kode pasien">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="text" name="usia" class="form-control" placeholder="Masukkan usia">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Masukkan alamat">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="telepon" class="form-control"
                                    placeholder="Masukkan no. telepon">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                    Simpan</button>
                                <a href="{{ route('pasien.index') }}" class="btn btn-danger btn-sm"><i
                                        class="fas fa-reply"></i>
                                    Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection
