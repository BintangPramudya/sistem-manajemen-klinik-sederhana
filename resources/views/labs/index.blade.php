@extends('layouts.app')
@section('title', 'Data Lab baru')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Lab baru</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Lab baru</h6>
            </div>
            <div class="card-body">
                <a href="{{route('lab.create')}}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>
                    Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($labs as $lab)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $lab->nama }}</td>
                                    <td>Rp. {{ $lab->harga }}</td>
                                    <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('lab.show', $lab->id) }}"><i
                                                    class="fas fa-fw fa-eye"></i>
                                                </a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('lab.edit', $lab->id) }}"><i
                                                class="fas fa-fw fa-pen"></i> </a>
                                        <form action="{{ route('lab.destroy', $lab->id) }}" method="POST" class="d-inline delete-form">
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
