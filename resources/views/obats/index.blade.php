@extends('layouts.app')
@section('title', 'Data Obat')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
            </div>
            <div class="card-body">
                <a href="{{ url('/tambah-data-obat') }}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>
                    Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Dosis</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Dosis</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->nama }}</td>
                                    <td>{{ $obat->jenis }}</td>
                                    <td>{{ $obat->dosis }}</td>
                                    <td>{{ $obat->stok }}</td>
                                    <td>Rp. {{ $obat->harga }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('obat.show', $obat->id) }}"><i
                                                class="fas fa-fw fa-eye"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('obat.edit', $obat->id) }}"><i
                                                class="fas fa-fw fa-pen"></i></a>
                                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete-button"><i
                                                    class="fas fa-fw fa-trash"></i> </button>
                                        </form>
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

@section('alerts')
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            @if ($lowStockObats->count() > 0)
                <span class="badge badge-danger badge-counter">{{ $lowStockObats->count() }}</span>
            @endif
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Alerts Center</h6>
            @forelse ($lowStockObats as $obat)
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-pills text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $obat->updated_at->format('F d, Y') }}</div>
                        <span class="font-weight-bold">{{ $obat->nama }} stok tinggal {{ $obat->stok }}</span>
                        <small
                            class="badge badge-pill badge-light text-muted">{{ $obat->updated_at->diffForHumans() }}</small>
                    </div>
                </a>
            @empty
                <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada notifikasi</a>
            @endforelse
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>
@endsection
