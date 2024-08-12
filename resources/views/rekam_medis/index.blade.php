@extends('layouts.app')

@section('title', 'Data Rekam Medis')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Rekam Medis</h1>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            @if (session('message'))
                swal("Sukses!", "{{ session('message') }}", "success");
            @endif
        </script>

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Rekam Medis</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-fw fa-plus"></i> Tambah Data
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Laboratorium</th>
                                <th>Obat</th>
                                <th>Dokter</th>
                                <th>Diagnosa</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Laboratorium</th>
                                <th>Obat</th>
                                <th>Dokter</th>
                                <th>Diagnosa</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($rekamMedis as $rekam)
                                <tr>
                                    <td>{{ $rekam->no_rm }}</td>
                                    <td>{{ $rekam->pasien->nama      }}</td>
                                    <td>{{ $rekam->lab->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->obat->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->dokter->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->diagnosa }}</td>
                                    <td>{{ $rekam->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('rekam-medis.show', $rekam->id) }}">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-success" href="{{ route('rekam-medis.edit', $rekam->id) }}">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                        {{-- <form action="{{ route('rekam-medis.destroy', $rekam->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete-button">
                                                <i class="fas fa-fw fa-trash"></i> Hapus
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('.delete-form');
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Data anda aman!");
                    }
                });
            });
        });
    </script>

@endsection
