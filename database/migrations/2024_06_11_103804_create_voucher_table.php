<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE voucher (
                id_voucher BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nama_voucher VARCHAR(255) NOT NULL,
                persentase_diskon INT NOT NULL,
                tanggal_mulai DATE NOT NULL,
                tanggal_kadaluarsa DATE NOT NULL,
                created_at TIMESTAMP NULL DEFAULT NULL,
                updated_at TIMESTAMP NULL DEFAULT NULL
            ) ENGINE=InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS voucher");
    }
};
