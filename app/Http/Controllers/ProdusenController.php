<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produsen;

class ProdusenController extends Controller
{
    public function index()
    {
        $data_Produsen = Produsen::all();

        return view('Produsen.index', compact('data_Produsen'));
    }

    public function tambah()
    {
        return view('Produsen.create');
    }


    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'lokasi'       => 'required|min:3',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'lokasi.required'        => 'Lokasi Harus di Isi !',
            'lokasi.min'             => 'Lokasi Minimal 3 Karakter !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Produsen();
        $data_to_save->nama         = $request->nama;
        $data_to_save->lokasi       = $request->lokasi;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function detail($id)
    {
        $detail_Produsen = Produsen::findOrFail($id);

        return view('Produsen.detail', compact('detail_Produsen'));
    }

    public function hapus($id)
    {
        $detail_Produsen = Produsen::findOrFail($id);

        if ($detail_Produsen->Produk()->exists()) {
            return back()->with('status', 'Tidak dapat hapus data ber-relasi !');
        }
        
        $detail_Produsen->delete();

        return back()->with('status', 'Data Berhasil di Hapus !');
    }

    public function ubah($id)
    {
        $detail_Produsen = Produsen::findOrFail($id);

        return view('Produsen.edit', compact('detail_Produsen'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'lokasi'       => 'required|min:3',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'lokasi.required'        => 'Lokasi Harus di Isi !',
            'lokasi.min'             => 'Lokasi Minimal 3 Karakter !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = Produsen::findOrFail($id);
        $data_to_save->nama         = $request->nama;
        $data_to_save->lokasi       = $request->lokasi;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

}
