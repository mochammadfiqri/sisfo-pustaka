<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('ddc_id')->nullable()->after('id');
            $table->dropColumn('kode_buku'); // Jika diperlukan, drop kolom lama setelah menambahkan kolom baru.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('kode_buku'); // Ubah kembali kolom 'ddc_id' menjadi 'kode_buku'
            $table->dropColumn('ddc_id'); // Drop kolom 'ddc_id'
        });
    }
};
