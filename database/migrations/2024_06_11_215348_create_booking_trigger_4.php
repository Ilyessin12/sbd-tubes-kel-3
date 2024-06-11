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
        DB::unprepared('DROP TRIGGER IF EXISTS `before_booking_insert_check_member`');

        // Create the new trigger
        DB::unprepared('
            CREATE TRIGGER `before_booking_insert_check_member` BEFORE INSERT ON `booking`
            FOR EACH ROW
            BEGIN
                -- Temporary variables to hold customer data
                DECLARE v_status_member VARCHAR(255);
                DECLARE v_kuota_member INT;

                -- Retrieve the status and kuota of the customer making the booking
                SELECT status_member, kuota_member INTO v_status_member, v_kuota_member
                FROM customer
                WHERE id_customer = NEW.id_customer;

                -- Check if the customer is a member and has kuota
                IF v_status_member = \'member\' AND v_kuota_member > 0 THEN
                    -- Decrease kuota_member by 1
                    UPDATE customer
                    SET kuota_member = kuota_member - 1
                    WHERE id_customer = NEW.id_customer;

                    -- Check if kuota_member is now 0 and update status_member if necessary
                    IF v_kuota_member - 1 = 0 THEN
                        UPDATE customer
                        SET status_member = \'non-member\'
                        WHERE id_customer = NEW.id_customer;
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
        DB::unprepared('DROP TRIGGER IF EXISTS `before_booking_insert_check_member`');
    }
};