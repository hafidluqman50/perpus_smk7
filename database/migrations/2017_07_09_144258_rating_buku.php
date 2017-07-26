<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RatingBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_buku', function (Blueprint $table) {
            $table->increments('id_rating');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_buku')->unsigned();
            $table->text('rating');
            $table->timestamps();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_buku');
    }
}
