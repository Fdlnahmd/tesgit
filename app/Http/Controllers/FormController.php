<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan; // Perbarui import untuk model Laporan
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kategori' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'aspirasi' => 'required',
            'keterangan' => 'required',
            'gambar_kejadian' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke penyimpanan
        $gambarKejadianPath = $request->file('gambar_kejadian')->store('public/gambar_kejadian');

        // Buat entri dalam database
        $laporan = new Laporan; // Gunakan namespace yang benar
        $laporan->kategori = $request->kategori;
        $laporan->nis = $request->nis;
        $laporan->name = $request->name;
        $laporan->kelas = $request->kelas;
        $laporan->aspirasi = $request->aspirasi;
        $laporan->keterangan = $request->keterangan;
        $laporan->gambar_kejadian = str_replace('public/', 'storage/', $gambarKejadianPath); // Ubah path untuk disimpan di kolom gambar_kejadian
        $laporan->status = 'menunggu'; // Status awal, bisa disesuaikan sesuai kebutuhan
        $laporan->save();

        // Beri respons
        return redirect()->back()->with('success', 'Formulir berhasil terkirim.');
    }
}
