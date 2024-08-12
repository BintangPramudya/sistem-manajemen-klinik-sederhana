<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::all();
        return view('labs.index', compact('labs'));
    }
    public function create()
    {
        return view('labs.insert');
    }

    // Menyimpan obat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        Lab::create($request->all());

        return redirect()->route('lab.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        return view('labs.update', compact('lab'));
    }

    // Memperbarui data obat tertentu di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $lab = Lab::findOrFail($id);
        $lab->update($request->all());

        return redirect()->route('lab.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function show($id)
    {
        $lab = Lab::findOrFail($id);
        return view('labs.show', compact('lab'));
    }
    // Menampilkan detail obat tertentu

    // Menghapus data obat tertentu dari database
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();

        return redirect()->route('lab.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
