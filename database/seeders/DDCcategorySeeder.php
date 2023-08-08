<?php

namespace Database\Seeders;

use App\Models\DDCcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DDCcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DDCcategory::create(['name' => 'Karya Umum', 'parent_id' => null, 'ddc_number' => '000']);
            DDCcategory::create(['name' => 'Ilmu Pengetahuan', 'parent_id' => 1, 'ddc_number' => '001']);
            DDCcategory::create(['name' => 'Teori Ilmu Pengetahuan', 'parent_id' => 1, 'ddc_number' => '001.01']);
            DDCcategory::create(['name' => 'UNESCO/Organisasi Pendidikan, Keilmuan, dan Kebudayaan PBB', 'parent_id' => 1, 'ddc_number' => '001.0601']);
            DDCcategory::create(['name' => 'Kehidupan Intelektual', 'parent_id' => 1, 'ddc_number' => '001.1']);
            DDCcategory::create(['name' => 'Humanisme', 'parent_id' => 1, 'ddc_number' => '001.3']);
            DDCcategory::create(['name' => 'Riset; Metode Statistik', 'parent_id' => 1, 'ddc_number' => '001.4']);
            DDCcategory::create(['name' => 'Metode Riset', 'parent_id' => 1, 'ddc_number' => '001.42']);
            DDCcategory::create(['name' => 'Riset Deskriptif, Metode Eksperimen dan Percobaan Ilmiah', 'parent_id' => 1, 'ddc_number' => '001.43']);
            DDCcategory::create(['name' => 'Pengetahuan Kontroversial', 'parent_id' => 1, 'ddc_number' => '001.9']);
            DDCcategory::create(['name' => 'Ilusi', 'parent_id' => 1, 'ddc_number' => '001.96']);
            DDCcategory::create(['name' => 'Buku', 'parent_id' => 1, 'ddc_number' => '002']);
            DDCcategory::create(['name' => 'Sistem', 'parent_id' => 1, 'ddc_number' => '003']);
            DDCcategory::create(['name' => 'Identifikasi Sistem', 'parent_id' => 1, 'ddc_number' => '003.1']);
            DDCcategory::create(['name' => 'Peramal dan Ramalan, Futurologi', 'parent_id' => 1, 'ddc_number' => '003.2']);
            DDCcategory::create(['name' => 'Model dan Simulasi Komputer', 'parent_id' => 1, 'ddc_number' => '003.3']);
            DDCcategory::create(['name' => 'Teori Komunikasi dan Kontrol', 'parent_id' => 1, 'ddc_number' => '003.5']);
            DDCcategory::create(['name' => 'Macam-macam System', 'parent_id' => 1, 'ddc_number' => '003.7']);
            DDCcategory::create(['name' => 'Pemrosesan Data, Ilmu Komputer, Teknik Informatika', 'parent_id' => 1, 'ddc_number' => '004']);
    }
}
