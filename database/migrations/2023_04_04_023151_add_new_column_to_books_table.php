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
            $table->string('abstrak', 255)->nullable()->after('judul');
            $table->string('pengarang')->nullable()->after('judul');
            $table->string('penerbit')->nullable()->after('judul');
            $table->string('kota_terbit')->nullable()->after('judul');
            $table->year('tahun_terbit', 4)->nullable()->after('judul');
            $table->integer('halaman')->nullable()->after('judul');
            $table->integer('isbn_issn')->nullable()->after('judul');
            $table->string('bahasa')->nullable()->after('judul');
            $table->string('kata_kunci')->nullable()->after('judul');
            $table->string('edisi')->nullable()->after('judul');
            $table->string('volume')->nullable()->after('judul');
            $table->string('cetakan')->nullable()->after('judul');
            $table->string('jilid')->nullable()->after('judul');
            $table->string('cover', 255)->nullable()->after('judul');
        });
    }

    public function dropNewColumn()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('abstrak');
            $table->dropColumn('pengarang');
            $table->dropColumn('penerbit');
            $table->dropColumn('kota_terbit');
            $table->dropColumn('tahun_terbit');
            $table->dropColumn('halaman');
            $table->dropColumn('isbn_issn');
            $table->dropColumn('bahasa');
            $table->dropColumn('kata_kunci');
            $table->dropColumn('edisi');
            $table->dropColumn('volume');
            $table->dropColumn('cetakan');
            $table->dropColumn('jilid');
            $table->dropColumn('cover');
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
            $this->dropNewColumn();
        });
    }
};
