<?php

namespace App\Http\Controllers;

use App\Models\Koperasi;
use App\Models\Mahasiswa;
use App\Http\Requests\StoreKoperasiRequest;
use App\Http\Requests\UpdateKoperasiRequest;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $koperasi = Koperasi::all();
        return view('koperasi.index', compact('koperasi', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $koperasi = Koperasi::all();

        $mahasiswa = Mahasiswa::all();
        return view('koperasi.create', compact('mahasiswa', 'koperasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mhs' => 'required',
            'jml' => 'required',
            'tgl' => 'required',
        ]);
        $koperasi = new Koperasi();
        $koperasi->id_mhs = $request->id_mhs;
        $koperasi->jml = $request->jml;
        $koperasi->tgl = $request->tgl;
        $koperasi->save();

        return redirect()->route('koperasi.index')->with('success', 'Koperasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::all();
        $koperasi = Koperasi::all();
        return view('koperasi.show', compact('mahasiswa', 'koperasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $koperasi = Koperasi::all();
        $mahasiswa = Mahasiswa::all();
        return view('koperasi.edit', compact('koperasi', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_mhs' => 'required',
            'jml' => 'required',
            'tgl' => 'required',
        ]);
        $koperasi = Koperasi::findOrFail($id);
        $koperasi->id_mhs = $request->id_mhs;
        $koperasi->jml = $request->jml;
        $koperasi->tgl = $request->tgl;
        $koperasi->save();

        return redirect()->route('koperasi.index')->with('success', 'Koperasi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $koperasi = Koperasi::findOrFail($id);
        $koperasi->delete();
        return redirect()->route('koperasi.index')->with('success', 'Koperasi deleted successfully');
    }
}
