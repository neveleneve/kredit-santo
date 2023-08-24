<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nasabah_id');
            $table->string('nik');
            $table->string('no_kk');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('status_pernikahan', ['belum kawin', 'kawin', 'cerai hidup', 'cerai mati']);
            $table->enum('pekerjaan', [1, 2, 3]);
            $table->enum('gaji', [1, 2, 3]);
            $table->enum('pengeluaran', [1, 2, 3]);
            $table->enum('tanggungan', [1, 2, 3]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_nasabahs');
    }
}
