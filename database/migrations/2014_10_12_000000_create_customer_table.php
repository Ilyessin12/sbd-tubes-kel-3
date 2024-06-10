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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('nama_customer');
            $table->string('email_customer')->unique();
            $table->string('telp_customer')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status_member')->default('non-member');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('role')->default('user');
            $table->integer(('kuota_member'))->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
