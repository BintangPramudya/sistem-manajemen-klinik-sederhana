<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $pasiens = Pasien::all();
        $obats = Obat::all();
        $labs = Lab::all();
        $dokters = Dokter::all();
        $rekamMedis = RekamMedis::all();
        $jumlahPasien = Pasien::count();
        $jumlahDokter = Dokter::count();
        $jumlahLaboratorium = Lab::count();
        $jumlahObat = Obat::count();
        // Ambil obat dengan stok kurang dari 10
        $lowStockObats = Obat::where('stok', '<', 10)->get();

        // Ambil jumlah pasien untuk setiap diagnosa
       $patientCountPerDiagnosis = DB::table('rekam_medis')
           ->select('diagnosa', DB::raw('COUNT(*) as total_patients'))
           ->groupBy('diagnosa')
           ->get();

       // Hitung rata-rata jumlah pasien untuk setiap diagnosa
       $averagePatientsPerDiagnosis = [];
       foreach ($patientCountPerDiagnosis as $record) {
           $averagePatientsPerDiagnosis[$record->diagnosa] = $record->total_patients / $jumlahPasien;
       }
            
        return view('dashboard.dashboard', compact('pasiens', 'obats', 'labs', 'dokters','rekamMedis', 'jumlahPasien', 'jumlahDokter', 'jumlahLaboratorium', 'jumlahObat', 'lowStockObats', 'averagePatientsPerDiagnosis'));
    }
}
