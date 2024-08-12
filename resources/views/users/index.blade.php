@extends('layouts.app')
@section('title', 'Data User')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
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
                <a href="{{route('user.create')}}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>
                    Regsiter</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-success" href="">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
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

@endsection
