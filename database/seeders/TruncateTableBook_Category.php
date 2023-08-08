<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TruncateTableBook_Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nama tabel yang ingin di-truncate
        $table = 'book_category';

        // Lakukan truncate pada tabel
        DB::table($table)->truncate();

        // Mereset auto increment ID ke 1
        DB::statement('ALTER TABLE ddc_categories AUTO_INCREMENT=1;');


    }
}
