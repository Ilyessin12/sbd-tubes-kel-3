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
        DB::unprepared('DROP TRIGGER IF EXISTS `check_voucher_expiration_before_booking_insert`');

        // Create the new trigger
        DB::unprepared('
            CREATE TRIGGER `check_voucher_expiration_before_booking_insert` BEFORE INSERT ON `booking`
            FOR EACH ROW
            BEGIN
                DECLARE voucher_expiration DATE;
                
                -- Only proceed if id_voucher is not NULL
                IF NEW.id_voucher IS NOT NULL THEN
                    -- Get the expiration date of the voucher
                    SELECT tanggal_kadaluarsa INTO voucher_expiration
                    FROM voucher
                    WHERE id_voucher = NEW.id_voucher;
                    
                    -- Check if the booking date is after the voucher\'s expiration date
                    IF NEW.tanggal_booking > voucher_expiration THEN
                        SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Cannot use expired voucher for booking\';
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
        DB::unprepared('DROP TRIGGER IF EXISTS `check_voucher_expiration_before_booking_insert`');
    }
};