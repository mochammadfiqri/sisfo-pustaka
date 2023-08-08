<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDCcategory extends Model
{
    use HasFactory;
    protected $table = 'ddc_detail';
    protected $fillable = [
        'name',
        'ddc_number',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'ddc_category', 'ddc_id', 'book_id');
    }

    public function isInduk()
    {
        return is_null($this->parent_id);
    }

}
