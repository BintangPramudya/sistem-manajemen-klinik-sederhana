<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan daftar obat
    public function index()
    {
        $obats = Obat::all();
        // Ambil obat dengan stok kurang dari 10
        $lowStockObats = Obat::where('stok', '<', 10)->get();
        return view('obats.index', compact('obats', 'lowStockObats'));
    }

    // Menampilkan form untuk membuat obat baru
    public function create()
    {
        return view('obats.create');
    }

    // Menyimpan obat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'dosis' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('message', 'Data Berhasil Ditambahkan!');
    }



    // Menampilkan form untuk mengedit obat tertentu
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obats.update', compact('obat'));
    }

    // Memperbarui data obat tertentu di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'dosis' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('obat.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obats.show', compact('obat'));
    }
    // Menampilkan detail obat tertentu

    // Menghapus data obat tertentu dari database
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
