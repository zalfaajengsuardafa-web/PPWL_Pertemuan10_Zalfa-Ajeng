<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Aku tentuin nama tabelnya secara eksplisit ke tabel 'buku'
    protected $table = 'buku';

    // Kolom-kolom yang boleh diisi secara massal saat simpan/update data
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];

    // Aku ubah tipe data tgl_terbit jadi date/datetime biar format date di Blade ($buku->tgl_terbit->format('d/m/Y')) ga error
    protected $casts = [
        'tgl_terbit' => 'date',
    ];
}