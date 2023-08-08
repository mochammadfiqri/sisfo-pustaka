<?php

namespace App\Observers;

use App\Models\DDCcategory;

class DDCcategoryObserver
{
    public function creating(DdcCategory $category)
    {
        // Panggil metode untuk menghasilkan nomor DDC saat kategori sedang dibuat
        // $this->generateDdcNumber($category);
    }

    public function updating(DdcCategory $category)
    {
        // Panggil metode untuk menghasilkan nomor DDC saat kategori sedang diupdate
        // $this->generateDdcNumber($category);
    }

    private function generateDdcNumber(DdcCategory $category)
    {
        // Jika kategori adalah kategori induk (tidak memiliki parent), nomor DDC adalah ID kategori dengan padding 3 digit
        // if (!$category->parent_id) {
        //     $category->ddc_number = (string)$category->id; // Mengubah menjadi string
        // } else {
        //     $parentCategory = DdcCategory::find($category->parent_id);
        //     if ($parentCategory) {
        //         $category->ddc_number = $parentCategory->ddc_number . '.' . str_pad($category->id, 3, '0', STR_PAD_LEFT);
        //     } else {
        //         // Jika kategori induk tidak ditemukan, tetapkan nilai default (misalnya "999")
        //         $category->ddc_number = '009';
        //         // Atau sesuaikan dengan nilai default yang sesuai dengan kebutuhan aplikasi Anda
        //     }
        // }
    }

    /**
     * Handle the DDCcategory "deleted" event.
     *
     * @param  \App\Models\DDCcategory  $dDCcategory
     * @return void
     */
    public function deleted(DDCcategory $dDCcategory)
    {
        //
    }

    /**
     * Handle the DDCcategory "restored" event.
     *
     * @param  \App\Models\DDCcategory  $dDCcategory
     * @return void
     */
    public function restored(DDCcategory $dDCcategory)
    {
        //
    }

    /**
     * Handle the DDCcategory "force deleted" event.
     *
     * @param  \App\Models\DDCcategory  $dDCcategory
     * @return void
     */
    public function forceDeleted(DDCcategory $dDCcategory)
    {
        //
    }
}
