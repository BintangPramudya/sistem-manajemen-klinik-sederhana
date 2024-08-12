<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokters.index', compact('dokters'));
    }
    public function create()
    {
        return view('dokters.insert');
    }

    // Menyimpan obat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kode_dokter' => 'required',
            'nama' => 'required',
            'spesialis' => 'required',
            'status' => 'required|boolean',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokters.update', compact('dokter'));
    }

    // Memperbarui data obat tertentu di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_dokter' => 'required',
            'nama' => 'required',
            'spesialis' => 'required',
            'status' => 'required|boolean',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokters.show', compact('dokter'));
    }
    // Menampilkan detail obat tertentu

    // Menghapus data obat tertentu dari database
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
