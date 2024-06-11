<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the trigger
        DB::unprepared('
            CREATE TRIGGER check_booking_before_insert
            BEFORE INSERT ON booking
            FOR EACH ROW
            BEGIN
                DECLARE existing_booking_count INT;

                SELECT COUNT(*) INTO existing_booking_count
                FROM booking
                WHERE id_fasilitas = NEW.id_fasilitas
                AND tanggal_booking = NEW.tanggal_booking
                AND status_booking != "canceled"
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
        DB::unprepared('DROP TRIGGER IF EXISTS check_booking_before_insert');
    }
};