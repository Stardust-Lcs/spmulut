<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_basis_pengetahuan')->unique();
            $table->string('kode_penyakit');
            $table->string('kode_gejala');
            $table->double('mb');
            $table->timestamps();

            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit');
            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('basis_pengetahuan');
    }
}
