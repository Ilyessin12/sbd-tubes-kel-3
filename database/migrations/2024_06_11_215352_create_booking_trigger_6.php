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
        DB::unprepared('DROP TRIGGER IF EXISTS `check_voucher_before_booking_update`');

        // Create the new trigger
        DB::unprepared('
            CREATE TRIGGER `check_voucher_before_booking_update` BEFORE UPDATE ON `booking`
            FOR EACH ROW
            BEGIN
                DECLARE voucher_start_date DATE;
                DECLARE voucher_expiration_date DATE;
                
                -- Only proceed if id_voucher is not NULL and is being changed
                IF NEW.id_voucher IS NOT NULL AND (NEW.id_voucher <> OLD.id_voucher OR NEW.tanggal_booking <> OLD.tanggal_booking) THEN
                    -- Get the start and expiration date of the voucher
                    SELECT tanggal_mulai, tanggal_kadaluarsa INTO voucher_start_date, voucher_expiration_date
                    FROM voucher
                    WHERE id_voucher = NEW.id_voucher;
                    
                    -- Check if the booking date is before the voucher\'s start date or after its expiration date
                    IF NEW.tanggal_booking < voucher_start_date OR NEW.tanggal_booking > voucher_expiration_date THEN
                        SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Voucher sudah expired atau belum berlaku\';
                    END IF;
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
        DB::unprepared('DROP TRIGGER IF EXISTS `check_voucher_before_booking_update`');
    }
};