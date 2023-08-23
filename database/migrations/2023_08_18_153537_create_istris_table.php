<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIstrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istris', function (Blueprint $table) {
            $table->id();
            $table->integer('nasabah_id');
            $table->string('nama');
            $table->string('nik');
            $table->enum('pekerjaan', [1, 2, 3]);
            $table->enum('gaji', [1, 2, 3]);
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
        Schema::dropIfExists('istris');
    }
}
