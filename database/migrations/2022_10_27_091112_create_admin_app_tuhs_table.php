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
        Schema::create('admin_app_tuhs', function (Blueprint $table) {
            $table->id();
            $table->string('nik_admin_app')->nullable();
            $table->string('nama_admin_app')->nullable();
            $table->string('password_admin_app')->nullable();
            $table->string('foto_admin_app')->default('foto.png');
            $table->string('aktif')->default('Y');
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
        Schema::dropIfExists('admin_app_tuhs');
    }
};
