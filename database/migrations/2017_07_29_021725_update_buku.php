<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku', function($table) {
            $table->string('pengarang')->after('judul_slug');
            $table->string('tempat_terbit')->after('penerbit');
            $table->string('sn_penulis')->after('pengarang');
            $table->text('keterangan')->after('foto_buku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
