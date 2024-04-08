<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan_balasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengaduan');
            // $table->foreignId('id_anggota');
            $table->enum('pengirim', ['admin', 'anggota']);
            $table->text('isi_balasan');
            // $table->integer('parent');

            $table->timestamps();

            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')
            ->onDelete('cascade')->onUpdate('cascade');


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_balasan');
    }
};
