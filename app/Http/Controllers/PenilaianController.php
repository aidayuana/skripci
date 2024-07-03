<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan halaman penilaian
        return view('pages.penilaian.index');
    }

    public function create()
    {
        // Logika untuk menampilkan form pembuatan penilaian
        return view('penilaian.create');
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan penilaian baru
        // Contoh validasi dan penyimpanan
        $request->validate([
            'nilai' => 'required|numeric',
            // tambahkan aturan validasi lainnya
        ]);

        // logika penyimpanan
        // Penilaian::create($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan.');
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit penilaian
        // $penilaian = Penilaian::find($id);
        // return view('penilaian.edit', compact('penilaian'));
    }

    public function update(Request $request, $id)
    {
        // Logika untuk memperbarui penilaian
        // Contoh validasi dan penyimpanan
        $request->validate([
            'nilai' => 'required|numeric',
            // tambahkan aturan validasi lainnya
        ]);

        // logika pembaruan
        // $penilaian = Penilaian::find($id);
        // $penilaian->update($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Logika untuk menghapus penilaian
        // $penilaian = Penilaian::find($id);
        // $penilaian->delete();

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil dihapus.');
    }
}
