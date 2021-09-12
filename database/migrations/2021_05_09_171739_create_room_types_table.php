<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('room_type');  // Standard, Deluxe, Superior Deluxe, Triple,  Family Suite, Business Suite
            $table->string('short_code')->nullable();
            $table->string('description')->nullable();
            $table->integer('price');
            $table->string('image');
            $table->integer('total_rooms');
            $table->integer('status'); // 0 -> active, 1 -> inactive
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
        Schema::dropIfExists('room_types');
    }
}
