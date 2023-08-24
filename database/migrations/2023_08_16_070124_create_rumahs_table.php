<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('rumah_code')->unique();
            $table->string('tipe_rumah');
            $table->integer('harga');
            $table->string('detail');
            // status value
            // 0 tidak tersedia / terjual
            // 1 dalam penawaran
            // 2 tersedia
            $table->enum('status', [0, 1, 2])->default('2')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rumahs');
    }
}
