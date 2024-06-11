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
        // Create the stored function
        DB::unprepared('
            DROP FUNCTION IF EXISTS `get_booking_count`;
            CREATE FUNCTION `get_booking_count`(id_customer BIGINT UNSIGNED) RETURNS int(11)
                DETERMINISTIC
            BEGIN
                DECLARE booking_count INT;
                SELECT COUNT(*) INTO booking_count
                FROM booking
                WHERE booking.id_customer = id_customer;
                RETURN booking_count;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the stored function
        DB::unprepared('DROP FUNCTION IF EXISTS `get_booking_count`');
    }
};