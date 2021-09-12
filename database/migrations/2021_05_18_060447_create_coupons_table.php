<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('offer_name');
            $table->bigInteger('room_type_id')->unsigned()->nullable();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->string('coupon_code');
            $table->string('coupon_limit');
            $table->string('coupon_type');
            $table->string('coupon_price');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('visibility_status')->default('0');
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
        Schema::dropIfExists('coupons');
    }
}
