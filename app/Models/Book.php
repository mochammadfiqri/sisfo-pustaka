<?php

namespace App\Models;

use App\Models\Category;
use App\Models\DDCcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        // 'ddc_number',
        'judul',
        'cover',
        'jilid',
        'cetakan',
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
        'url',
        'file',
    ];

    /**
     * The roles that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

    public function DDCcategories(): BelongsToMany
    {
        return $this->belongsToMany(DDCcategory::class, 'ddc_category', 'book_id', 'ddc_id');
    }
}
