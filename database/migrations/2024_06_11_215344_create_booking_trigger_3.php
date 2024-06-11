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
        // Drop the trigger if it already exists to avoid errors on migration
        DB::unprepared('DROP TRIGGER IF EXISTS `calculate_total_harga_before_booking_insert`');

        // Create the new trigger
        DB::unprepared('
            CREATE TRIGGER `calculate_total_harga_before_booking_insert` BEFORE INSERT ON `booking`
            FOR EACH ROW
            BEGIN
                DECLARE harga_fasilitas INT;
                DECLARE jam_mulai TIME;
                DECLARE jam_selesai TIME;
                DECLARE harga_ekstra INT DEFAULT 0;
                DECLARE jumlah_ekstra INT;
                DECLARE persentase_diskon DECIMAL(5,2) DEFAULT 0;
                DECLARE total_harga DECIMAL(10,2);
                DECLARE customer_status VARCHAR(255);

                -- Check customer status
                SELECT status_member INTO customer_status FROM customer WHERE id_customer = NEW.id_customer;
                IF customer_status = \'member\' THEN
                    SET NEW.total_harga = 0;
                ELSE
                    -- Calculate total harga
                    SELECT fasilitas.harga INTO harga_fasilitas FROM fasilitas WHERE id_fasilitas = NEW.id_fasilitas;
                    SET jam_mulai = NEW.jam_mulai;
                    SET jam_selesai = NEW.jam_selesai;
                    SET jumlah_ekstra = NEW.jumlah_ekstra;

                    -- Check if id_ekstra is not NULL then get harga ekstra
                    IF NEW.id_ekstra IS NOT NULL THEN
                        SELECT ekstra.harga INTO harga_ekstra FROM ekstra WHERE id_ekstra = NEW.id_ekstra;
                    END IF;

                    -- Check if id_voucher is not NULL then get persentase diskon
                    IF NEW.id_voucher IS NOT NULL THEN
                        SELECT voucher.persentase_diskon INTO persentase_diskon FROM voucher WHERE id_voucher = NEW.id_voucher;
                    END IF;

                    -- Calculate total harga
                    SET total_harga = ((harga_fasilitas * (TIME_TO_SEC(jam_selesai) - TIME_TO_SEC(jam_mulai) + 60)/3600) + (harga_ekstra * jumlah_ekstra)) * (1 - persentase_diskon/100);

                    SET NEW.total_harga = total_harga;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `calculate_total_harga_before_booking_insert`');
    }
};