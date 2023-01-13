<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Produsen;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {

        // Variable Pencarian
        $cari_Nama_Produk = $request->cari_Nama_Produk;
        $cari_nama_Produsen = $request->cari_nama_Produsen;

        $tipe_sort = 'desc';
        $var_sort = 'created_at';

        // Prepare Model
        $data_Produk = Produk::query();

        // Kondisi Pencarian
        if ($request->filled('cari_Nama_Produk')) {
            $data_Produk = $data_Produk->where('Nama_Produk', 'LIKE', '%' . $cari_Nama_Produk . '%');
        }

        if ($request->filled('cari_nama_Produsen')) {
            $data_Produk = $data_Produk->whereHas('Produsen', function (Builder $query) use ($cari_nama_Produsen) {
                $query->where('nama', 'LIKE', '%' . $cari_nama_Produsen . '%');
            });
        }

        // Kondisi Sorting
        if( $request->has('tipe_sort') || $request->has('var_sort') ) {
            $tipe_sort = $request->tipe_sort;
            $var_sort = $request->var_sort;

            $data_Produk = $data_Produk->orderBy($var_sort, $tipe_sort);
        }

        // Kondisi Paginate

        $set_pagination = $request->set_pagination;

        if ($request->filled('set_pagination')) {
            $data_Produk = $data_Produk
                        ->orderBy($var_sort, $tipe_sort)
                        ->paginate($set_pagination);
        } else {
            $data_Produk = $data_Produk
                        ->orderBy($var_sort, $tipe_sort)
                        ->paginate(5);
        }

        // Append Query String to Pagination
        $data_Produk = $data_Produk->withQueryString();


        // Return View dengan Data
        return view('Produk.index', compact(
            'data_Produk',
            'cari_Nama_Produk',
            'cari_nama_Produsen',
        
            'tipe_sort',
            'var_sort',

            'set_pagination'
        ));

        
    }

    public function tambah()
    {
        $data_Produsen = Produsen::all();

        return view('Produk.create', compact('data_Produsen'));
    }



    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'Nama_Produk'         => 'required|min:3',
            'Jenis_Produk'      => 'required|min:3',
            'Produsen_ke'   => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'Nama_Produk.required'        => 'Judul Harus di Isi !',
            'Nama_Produk.min'             => 'Judul Minimal 3 Karakter !',

            'Jenis_Produk.required'     => 'Edisi Harus di Isi',
            'Jenis_Produk.min'      => 'Edisi Harus Berupa Angka',
            'Produsen_ke.required'  => 'Penerbit Harus di Isi',
            
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Produk();
        $data_to_save->Nama_Produk        = $request->Nama_Produk;
        $data_to_save->Jenis_Produk     = $request->Jenis_Produk;
        $data_to_save->Produsen_id  = $request->Produsen_ke;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function detail($id)
    {
        $detail_Produk = Produk::findOrFail($id);

        return view('Produk.detail', compact('detail_Produk'));
    }

    public function hapus($id)
    {
        $detail_Produk = Produk::findOrFail($id);

        $detail_Produk->delete();

        return back()->with('status', 'Data Berhasil di Hapus !');
    }

    public function ubah($id)
    {
        $detail_Produk = Produk::findOrFail($id);
        $data_Produsen = Produsen::all();

        return view('Produk.edit', compact('detail_Produk', 'data_Produsen'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'Nama_Produk'         => 'required|min:3',
            'Jenis_Produk'      => 'required|numeric',
            'penerbit_ke'   => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'Nama_Produk.required'        => 'Judul Harus di Isi !',
            'Nama_Produk.min'             => 'Judul Minimal 3 Karakter !',

            'Jenis_Produk.required'     => 'Edisi Harus di Isi',
            'Jenis_Produk.numeric'      => 'Edisi Harus Berupa Angka',
            'penerbit_ke.required'  => 'Penerbit Harus di Isi',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Produk();
        $data_to_save->Nama_Produk        = $request->Nama_Produk;
        $data_to_save->Jenis_Produk     = $request->Jenis_Produk;
        $data_to_save->Produsen_id  = $request->Produsen_ke;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Update Data Berhasil !');
    }
    
    

}