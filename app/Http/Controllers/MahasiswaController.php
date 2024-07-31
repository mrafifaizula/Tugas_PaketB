<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('id', 'desc')->get();
        return view('mahasiswa.index', compact('mahasiswa'));

    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|max:2048|mimes:png,jpg',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->alamat = $request->alamat;

        // upload foto
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/mahasiswa/', $name);
            $mahasiswa->foto = $name;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'data berhasil ditambahkan');

    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));

    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            // 'foto' => 'required|max:2048|mimes:png,jpg',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $mahasiswa->deleteImage(); // untuk hapus gambar seblum di ganti
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/mahasi$mahasiswa/', $name);
            $mahasiswa->foto = $name;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully');

    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'data berhasil dihapus!');

    }
}
