<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            //Billing address
            $table->string('user_id');
            $table->float('total');
            $table->string('full_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            //Credit card details
            $table->string('name_on_card');
            $table->bigInteger('card_no');
            $table->integer('cvv');
            $table->integer('exp_month');
            $table->integer('exp_day');
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
        Schema::dropIfExists('checkouts');
    }
}
