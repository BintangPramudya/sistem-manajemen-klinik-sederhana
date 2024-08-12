@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Pasien Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPasien }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Dokter Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahDokter }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Laboratorium Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                Laboratorium
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jumlahLaboratorium }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-flask fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stok Obat Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Stok Obat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahObat }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Tabel Pasien -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pasien</h6>
                </div>
                <div class="card-body">
                    <div id="grafikPasien" class="table-responsive">
                       <table id="averagePatientsPerDiagnosisChart" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Laboratorium</th>
                                <th>Obat</th>
                                <th>Dokter</th>
                                <th>Diagnosa</th>
                                <th>Tanggal</th>
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
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($rekamMedis as $rekam)
                                <tr>
                                    <td>{{ $rekam->no_rm }}</td>
                                    <td>{{ $rekam->pasien->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->lab->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->obat->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->dokter->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $rekam->diagnosa }}</td>
                                    <td>{{ $rekam->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tabel Obat -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Obat</h6>
                </div>
                <div class="card-body">
                    <div id="grafikObat" class="table-responsive">
                        <table class="table table-bordered" id="dataTableObat" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Dosis</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Dosis</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($obats as $obat)
                                    <tr>
                                        <td>{{ $obat->nama }}</td>
                                        <td>{{ $obat->jenis }}</td>
                                        <td>{{ $obat->dosis }}</td>
                                        <td>{{ $obat->stok }}</td>
                                        <td>Rp. {{ $obat->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row for Dokter and Laboratorium -->
    <div class="row">
        <!-- Tabel Dokter -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dokter</h6>
                </div>
                <div class="card-body">
                    <div id="grafikDokter" class="table-responsive">
                        <table class="table table-bordered" id="dataTableDokter" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Dokter</th>
                                    <th>Nama</th>
                                    <th>Spesialis</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Dokter</th>
                                    <th>Nama</th>
                                    <th>Spesialis</th>
                                    <th>Status</th>
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
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Laboratorium -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laboratorium</h6>
                </div>
                <div class="card-body">
                    <div id="grafikLaboratorium" class="table-responsive">
                        <table class="table table-bordered" id="dataTableLaboratorium" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($labs as $lab)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lab->nama }}</td>
                                        <td>Rp. {{ $lab->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.container-fluid -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ambil data dari tabel obat dan siapkan dalam format yang sesuai untuk grafik
            var obatData = [];

            // Mengambil data stok obat dari tabel obat
            $("table#dataTableObat tbody tr").each(function() {
                var nama = $(this).find("td:nth-child(1)").text(); // Ambil teks dari kolom nama obat
                var stok = parseInt($(this).find("td:nth-child(4)")
            .text()); // Ambil teks dari kolom stok obat dan ubah menjadi integer
                obatData.push({
                    name: nama,
                    y: stok
                });
            });

            // Buat grafik pie chart menggunakan Highcharts
            Highcharts.chart('grafikObat', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Stok Obat'
                },
                series: [{
                    name: 'Stok',
                    colorByPoint: true,
                    data: obatData
                }]
            });

            // Ambil data dari tabel laboratorium dan siapkan dalam format yang sesuai untuk grafik donat
            var labData = [];

            // Mengambil data harga dari tabel laboratorium
            $("table#dataTableLaboratorium tbody tr").each(function() {
                var nama = $(this).find("td:nth-child(2)")
            .text(); // Ambil teks dari kolom nama laboratorium
                var harga = parseInt($(this).find("td:nth-child(3)").text().replace(/[^0-9]/g,
                '')); // Ambil teks dari kolom harga dan ubah menjadi integer
                labData.push({
                    name: nama,
                    y: harga
                });
            });

            // Buat grafik donat menggunakan Highcharts
            Highcharts.chart('grafikLaboratorium', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Harga Laboratorium'
                },
                plotOptions: {
                    pie: {
                        innerSize: '50%'
                    }
                },
                series: [{
                    name: 'Harga',
                    colorByPoint: true,
                    data: labData
                }]
            });

            // Ambil data dari tabel dokter dan siapkan dalam format yang sesuai untuk grafik
            var dokterCategories = [];
            var dokterData = [];

            // Mengambil data status dokter dari tabel dokter
            $("table#dataTableDokter tbody tr").each(function() {
                dokterCategories.push($(this).find("td:nth-child(2)")
            .text()); // Ambil teks dari kolom kode dokter
                var status = $(this).find("td:nth-child(5) .badge").hasClass("badge-success") ? 1 :
                0; // Ambil teks dari kolom status dan ubah menjadi 1 atau 0
                dokterData.push(status);
            });

            // Buat grafik garis menggunakan Highcharts
            Highcharts.chart('grafikDokter', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Status Dokter'
                },
                xAxis: {
                    categories: dokterCategories,
                    title: {
                        text: 'Kode Dokter'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Status Dokter'
                    },
                    labels: {
                        formatter: function() {
                            return this.value === 1 ? 'Aktif' : 'Tidak Aktif';
                        }
                    }
                },
                series: [{
                    name: 'Status Dokter',
                    data: dokterData
                }]
            });
        });

            // Data untuk grafik
            var averagePatientsPerDiagnosis = {!! json_encode($averagePatientsPerDiagnosis) !!};

            // Konversi data ke format yang diterima oleh Highcharts
            var chartData = [];
            for (var diagnosis in averagePatientsPerDiagnosis) {
                chartData.push({
                    name: diagnosis,
                    y: averagePatientsPerDiagnosis[diagnosis]
                });
            }

            // Buat grafik menggunakan Highcharts
            Highcharts.chart('averagePatientsPerDiagnosisChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Rata-Rata Jumlah Pasien per Diagnosa'
                },
                xAxis: {
                    type: 'category',
                    title: {
                        text: 'Diagnosa'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Rata-Rata Jumlah Pasien'
                    }
                },
                series: [{
                    name: 'Diagnosa',
                    data: chartData
                }]
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
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
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
