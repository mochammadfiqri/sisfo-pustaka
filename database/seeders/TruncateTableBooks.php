<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TruncateTableBooks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengosongkan tabel ddc_categories
        Book::truncate();

        // Mereset auto increment ID ke 1
        DB::statement('ALTER TABLE ddc_categories AUTO_INCREMENT=1;');
    }
}
