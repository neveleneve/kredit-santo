<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjaminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjamins', function (Blueprint $table) {
            $table->id();
            $table->integer('nasabah_id');
            $table->enum('tipe_penjamin', ['ayah', 'ibu', 'saudara', 'lainnya'])->nullable();
            $table->string('nama')->nullable();
            $table->string('kontak')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('penjamins');
    }
}
