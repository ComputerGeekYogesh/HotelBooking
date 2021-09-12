<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_no');
            $table->bigInteger('booking_id')->unsigned()->nullable();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
            $table->bigInteger('room_type_id')->unsigned()->nullable();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('set null');
            $table->bigInteger('floor_id')->unsigned()->nullable();
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('set null');
            $table->integer('status'); // 0 -> Available, 1 -> Reserved, 2-> Occupied, 3-> Notavailable, 4-> BeingServiced, 5-> Other
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
        Schema::dropIfExists('rooms');
    }
}
