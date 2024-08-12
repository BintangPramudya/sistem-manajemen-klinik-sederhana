@extends('layouts.app')
@section('title', 'Data Dokter')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Dokter</h1>
        {{-- alerts --}}
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

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>
                    Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Dokter</th>
                                <th>Nama</th>
                                <th>Spesialis</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Dokter</th>
                                <th>Nama</th>
                                <th>Spesialis</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dokters as $dokter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dokter->kode_dokter }}</td>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->spesialis }}</td>
                                    <td>
                                        @if ($dokter->status)
                                            <span class="badge badge-success">Praktek</span>
                                        @else
                                            <span class="badge bg-danger text-white">Tidak Praktek</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('dokter.show', $dokter->id) }}"><i
                                                class="fas fa-fw fa-eye"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('dokter.edit', $dokter->id) }}"><i
                                                class="fas fa-fw fa-pen"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
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
