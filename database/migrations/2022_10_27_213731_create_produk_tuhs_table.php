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
        Schema::create('produk_tuhs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk')->nullable();
            $table->double('harga_produk', 16, 2);
            $table->string('harga_produk_display')->nullable();
            $table->text('deskripsi_produk')->nullable();
            $table->string('foto_produk')->default('foto_produk_tuh/foto_produk_tuh.png');
            $table->string('url_foto_produk_tuh')->default('https://khadafizubaidi.xyz/foto_produk_tuh/foto_produk_tuh.png');
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
        Schema::dropIfExists('produk_tuhs');
    }
};
