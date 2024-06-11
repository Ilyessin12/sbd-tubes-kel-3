<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the trigger if it already exists to avoid errors on migration
        DB::unprepared('DROP TRIGGER IF EXISTS `check_booking_before_update`');

        // Create the new trigger
        DB::unprepared('
            CREATE TRIGGER `check_booking_before_update` BEFORE UPDATE ON `booking`
            FOR EACH ROW
            BEGIN
                DECLARE existing_booking_count INT;

                SELECT COUNT(*) INTO existing_booking_count
                FROM booking
                WHERE id_fasilitas = NEW.id_fasilitas
                AND tanggal_booking = NEW.tanggal_booking
                AND status_booking != "canceled"
                AND id_booking != NEW.id_booking -- Exclude the current booking from the check
                AND ((NEW.jam_mulai BETWEEN jam_mulai AND jam_selesai) OR (NEW.jam_selesai BETWEEN jam_mulai AND jam_selesai));

                IF existing_booking_count > 0 THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Fasilitas sudah di booking di jam segini";
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
        DB::unprepared('DROP TRIGGER IF EXISTS `check_booking_before_update`');
    }
};