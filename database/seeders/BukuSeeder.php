<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Illuminate\Support\Carbon;

class BukuSeeder extends Seeder
{
    /**
     * Menjalankan proses pengisian data sampel (dummy) sebanyak 18 buku ke tabel `buku`.
     *
     * @return void
     */
    public function run()
    {
        // Array berisi 18 data buku dengan berbagai variasi judul, penulis, harga, dan tanggal terbit
        $bukuList = [
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'harga' => 135000, 'tgl_terbit' => '1980-08-25'],
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'harga' => 95000, 'tgl_terbit' => '2005-09-15'],
            ['judul' => 'Laut Bercerita', 'penulis' => 'Leila S. Chudori', 'harga' => 115000, 'tgl_terbit' => '2017-10-12'],
            ['judul' => 'Cantik Itu Luka', 'penulis' => 'Eka Kurniawan', 'harga' => 128000, 'tgl_terbit' => '2002-12-01'],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'harga' => 98000, 'tgl_terbit' => '2018-11-26'],
            ['judul' => 'Hujan', 'penulis' => 'Tere Liye', 'harga' => 89000, 'tgl_terbit' => '2016-01-20'],
            ['judul' => 'Pulang', 'penulis' => 'Tere Liye', 'harga' => 85000, 'tgl_terbit' => '2015-09-10'],
            ['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'harga' => 92000, 'tgl_terbit' => '2014-01-15'],
            ['judul' => 'Ronggeng Dukuh Paruk', 'penulis' => 'Ahmad Tohari', 'harga' => 78000, 'tgl_terbit' => '1982-05-14'],
            ['judul' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'penulis' => 'Dee Lestari', 'harga' => 105000, 'tgl_terbit' => '2001-02-16'],
            ['judul' => 'Perahu Kertas', 'penulis' => 'Dee Lestari', 'harga' => 99000, 'tgl_terbit' => '2009-08-28'],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'harga' => 88000, 'tgl_terbit' => '2009-07-17'],
            ['judul' => '5 cm', 'penulis' => 'Donny Dhirgantoro', 'harga' => 82000, 'tgl_terbit' => '2005-05-21'],
            ['judul' => 'Tenggelamnya Kapal Van Der Wijck', 'penulis' => 'Hamka', 'harga' => 75000, 'tgl_terbit' => '1938-03-10'],
            ['judul' => 'Saman', 'penulis' => 'Ayu Utami', 'harga' => 80000, 'tgl_terbit' => '1998-05-05'],
            ['judul' => 'Aroma Karsa', 'penulis' => 'Dee Lestari', 'harga' => 125000, 'tgl_terbit' => '2018-03-16'],
            ['judul' => 'Dilan: Dia adalah Dilanku Tahun 1990', 'penulis' => 'Pidi Baiq', 'harga' => 89000, 'tgl_terbit' => '2014-04-28'],
            ['judul' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'penulis' => 'Mark Manson', 'harga' => 97000, 'tgl_terbit' => '2018-02-20'],
        ];

        // Loop untuk memasukkan setiap baris data ke dalam database
        foreach ($bukuList as $data) {
            Buku::create([
                'judul'      => $data['judul'],
                'penulis'    => $data['penulis'],
                'harga'      => $data['harga'],
                'tgl_terbit' => $data['tgl_terbit'],
            ]);
        }
    }
}