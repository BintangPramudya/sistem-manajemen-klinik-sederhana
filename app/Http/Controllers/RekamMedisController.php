<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Lab;
use App\Models\Obat;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pasien', 'lab', 'obat', 'dokter'])->get();
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $labs = Lab::all();
        $obats = Obat::all();
        $dokters = Dokter::all();
        return view('rekam_medis.insert', compact('pasiens', 'labs', 'obats', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required',
            'pasien_id' => 'required|exists:pasiens,id',
            'lab_id' => 'required|exists:labs,id',
            'obat_id' => 'required|exists:obats,id',
            'dokter_id' => 'required|exists:dokters,id',
            'diagnosa' => 'required',
        ]);

        // Kurangi stok obat
        $obat = Obat::find($request->obat_id);
        if ($obat->stok <= 0) {
            return back()->with('error', 'Stok obat habis');
        }
        $obat->stok -= 1;
        $obat->save();

        RekamMedis::create($validated);
        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RekamMedis $rekamMedi)
    {
        return view('rekam_medis.show', compact('rekamMedi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekamMedi)
    {
        $pasiens = Pasien::all();
        $labs = Lab::all();
        $obats = Obat::all();
        $dokters = Dokter::all();
        return view('rekam_medis.updated', compact('rekamMedi', 'pasiens', 'labs', 'obats', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedi)
    {
        $validated = $request->validate([
            'no_rm' => 'required',
            'pasien_id' => 'required|exists:pasiens,id',
            'lab_id' => 'required|exists:labs,id',
            'obat_id' => 'required|exists:obats,id',
            'dokter_id' => 'required|exists:dokters,id',
            'diagnosa' => 'required',
        ]);

        $rekamMedi->update($validated);
        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedi)
    {
        $rekamMedi->delete();
        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil dihapus.');
    }
}
