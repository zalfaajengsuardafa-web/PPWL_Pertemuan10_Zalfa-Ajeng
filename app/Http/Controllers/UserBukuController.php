<?php

namespace App\Http\Controllers;

use App\Models\Buku; // Sesuaikan dengan nama Model buku di project-mu (misal: Buku atau Book)
use Illuminate\Http\Request;

class UserBukuController extends Controller
{
    /**
     * Menampilkan daftar katalog buku untuk sisi user/pembaca.
     */
    public function index(Request $request)
    {
        // Menyiapkan query builder
        $query = Buku::query();

        // Fitur pencarian berdasarkan judul atau penulis (opsional)
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('penulis', 'like', '%' . $request->search . '%');
        }

        // Ambil data buku dengan pagination (misal 8 data per halaman)
        $data_buku = $query->paginate(8);

        // Hitung total jumlah buku
        $jumlah_buku = Buku::count();

        // Panggil view index yang sudah digabung (tampilan user)
        return view('buku.index', compact('data_buku', 'jumlah_buku'));
    }
}