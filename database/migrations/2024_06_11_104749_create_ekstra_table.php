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
            CREATE TABLE ekstra (
                id_ekstra BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nama_ekstra VARCHAR(255) NOT NULL,
                deskripsi VARCHAR(255) NOT NULL,
                harga INT NOT NULL
            ) ENGINE=InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS ekstra;");
    }
};