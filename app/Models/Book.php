<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'kode_buku',
        'judul',
        // 'cover',
        'jilid',
        'cetakan',
        'volume',
        'edisi',
        'kata_kunci',
        'bahasa',
        'isbn_issn',
        'halaman',
        'tahun_terbit',
        'kota_terbit',
        'penerbit',
        'pengarang',
        'abstrak',
        'file',
        'status',
    ];
}
