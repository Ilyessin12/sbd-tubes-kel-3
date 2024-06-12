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
            CREATE TABLE booking (
                id_booking BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                status_booking VARCHAR(255) NOT NULL DEFAULT 'pending',
                tanggal_booking DATE NOT NULL,
                jumlah_ekstra INT NOT NULL DEFAULT 0,
                jam_mulai TIME NOT NULL,
                jam_selesai TIME NOT NULL,
                total_harga DECIMAL(10, 2) NOT NULL,
                id_customer BIGINT UNSIGNED NOT NULL,
                id_fasilitas BIGINT UNSIGNED NOT NULL,
                id_voucher BIGINT UNSIGNED NULL DEFAULT NULL,
                id_ekstra BIGINT UNSIGNED NULL DEFAULT NULL,
                FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
                FOREIGN KEY (id_fasilitas) REFERENCES fasilitas(id_fasilitas),
                FOREIGN KEY (id_voucher) REFERENCES voucher(id_voucher),
                FOREIGN KEY (id_ekstra) REFERENCES ekstra(id_ekstra)
            ) ENGINE=InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS booking;");
    }
};