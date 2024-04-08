<?php

use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->default('default.png');
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        $user = new Admin();
        $user ->nama = 'admin';
        $user ->email = 'admin@mail';
        $user ->password = bcrypt('123');
        $user ->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
