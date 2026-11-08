<?php

// File terjemahan pesan validasi bahasa Indonesia
return [
    // Pesan untuk aturan yang sering dipakai
    'required' => ':attribute wajib diisi.',
    'string'   => ':attribute harus berupa teks.',
    'numeric'  => ':attribute harus berupa angka.',
    'integer'  => ':attribute harus berupa bilangan bulat.',
    'date'     => ':attribute bukan tanggal yang valid.',
    'email'    => ':attribute harus berupa alamat email yang valid.',
    'unique'   => ':attribute sudah digunakan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date_format' => ':attribute tidak sesuai format :format.',

    // Aturan yang pesannya bergantung pada tipe isian
    'min' => [
        'numeric' => ':attribute minimal bernilai :min.',
        'string'  => ':attribute minimal terdiri dari :min karakter.',
    ],
    'max' => [
        'numeric' => ':attribute maksimal bernilai :max.',
        'string'  => ':attribute maksimal terdiri dari :max karakter.',
    ],
    'between' => [
        'numeric' => ':attribute harus bernilai antara :min dan :max.',
        'string'  => ':attribute harus terdiri dari :min sampai :max karakter.',
    ],

    // Nama isian yang tampil pada pesan (menggantikan :attribute)
    'attributes' => [
        'judul'      => 'Judul buku',
        'penulis'    => 'Penulis',
        'harga'      => 'Harga',
        'tgl_terbit' => 'Tanggal terbit',
        'email'      => 'Email',
        'password'   => 'Kata sandi',
        'name'       => 'Nama',
    ],
];