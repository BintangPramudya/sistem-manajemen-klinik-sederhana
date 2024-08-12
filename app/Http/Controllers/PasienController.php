<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data pasien dari model
        $pasiens = Pasien::all();

        // Mengembalikan view index pasien dengan data pasien
        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        // Mengembalikan view create pasien
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'kode_pasien' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required|numeric',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Menyimpan data pasien ke database
        Pasien::create([
            'kode_pasien' => $request->kode_pasien,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        // Redirect ke halaman index pasien dengan pesan sukses
        return redirect()->route('pasien.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Pasien $pasien)
    {
        // Mengembalikan view edit pasien dengan data pasien
        return view('pasiens.update', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        // Validasi data yang masuk
        $request->validate([
            'kode_pasien' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required|numeric',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Update data pasien di database
        $pasien->update($request->all());

        // Redirect ke halaman index pasien dengan pesan sukses
        return redirect()->route('pasien.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        
        return view('pasiens.show', compact('pasien'));
    }
}
