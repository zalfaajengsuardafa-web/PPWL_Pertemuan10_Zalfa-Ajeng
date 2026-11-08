<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar buku dilengkapi dengan pagination.
     */
    public function index()
    {
        // 1. Ambil data buku dengan pagination (5 item per halaman, diurutkan dari data terbaru)
        $data_buku = Buku::orderBy('id', 'desc')->paginate(5);

        // 2. Hitung total keseluruhan buku
        $jumlah_buku = Buku::count();

        // 3. Hitung nomor urut tabel agar sinkron dengan nomor halaman pagination
        $no = ($data_buku->currentPage() - 1) * $data_buku->perPage();

        // 4. Kirim data ke tampilan Blade
        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku'));
    }

    // Form buat nambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Proses simpan data buku baru
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'      => 'required|string',
            'penulis'    => 'required|string',
            'harga'      => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.index')->with('pesan', 'Data buku berhasil disimpan');
    }

    // Form buat edit data buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Proses update data buku
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'      => 'required|string',
            'penulis'    => 'required|string',
            'harga'      => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->update();

        return redirect()->route('buku.index')->with('pesan', 'Data buku berhasil diubah');
    }

    // Hapus data buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('pesan', 'Data buku berhasil dihapus');
    }
}