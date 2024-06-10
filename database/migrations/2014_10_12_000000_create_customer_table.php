<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE customer (
                id_customer BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nama_customer VARCHAR(255) NOT NULL,
                email_customer VARCHAR(255) UNIQUE NOT NULL,
                telp_customer VARCHAR(255) UNIQUE NOT NULL,
                email_verified_at TIMESTAMP NULL,
                password VARCHAR(255) NOT NULL,
                status_member VARCHAR(255) NOT NULL DEFAULT 'non-member',
                tanggal_mulai DATE NULL,
                tanggal_selesai DATE NULL,
                role VARCHAR(255) NOT NULL DEFAULT 'user',
                kuota_member INT NOT NULL DEFAULT 0,
                remember_token VARCHAR(100) NULL,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            ) ENGINE=InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS customer;");
    }
};