<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->string('payment_id')->nullable();
            $table->integer('payment_mode')->nullable(); // 0 -> Cash, 1 -> Online , 2-> CreditCard detail (cardno, cardtypes) , 3-> other options also like paypal, stripe, instamojo, rajorpay etc....
            $table->integer('paid_amount')->nullable();
            $table->integer('payment_status')->nullable(); // 0 -> Unpaid, 1 -> Pending, 2-> Completed, 3-> Failed, 4-> Declined, 5-> Canceled, 6-> Abandoned, 7-> Settling, 8-> Settled, 9-> Refund
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
        Schema::dropIfExists('payments');
    }
}
