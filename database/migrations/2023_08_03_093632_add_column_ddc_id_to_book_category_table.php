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
        Schema::table('book_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ddc_id')->after('id');
            $table->foreign('ddc_id')->references('id')->on('ddc_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_category', function (Blueprint $table) {
            $table->dropForeign('book_category_ddc_id_foreign');
            $table->dropColumn('ddc_id');
        });
    }
};
