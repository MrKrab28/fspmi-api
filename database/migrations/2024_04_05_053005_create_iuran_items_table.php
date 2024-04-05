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
        Schema::create('iuran_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_iuran');
            $table->integer('nominal');
            $table->date('tgl_bayar');
            $table->timestamps();


            $table->foreign('id_iuran')->references('id')->on('iuran')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_items');
    }
};
