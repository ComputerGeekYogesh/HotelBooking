<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guest_id')->unsigned()->nullable();
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->integer('booking_no');
            $table->date('booking_date');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->integer('booking_type')->default('1');
            $table->integer('booking_status'); // 0 -> Requested, 1 -> Pending, 2-> Confirmed, 3-> Checked-in, 4-> Checked-out, 5-> Canceled, 6-> Abandoned
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
