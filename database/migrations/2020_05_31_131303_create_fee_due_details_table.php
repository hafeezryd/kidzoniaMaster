<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDueDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_due_details', function (Blueprint $table) {
            $table->id();
            $table->integer('fee_due_header_id');
            $table->string('fee_payment_type');
            $table->string('fee_payment_value');
            $table->string('fee_payment_paid');
            $table->string('fee_payment_balance');
            $table->integer('virtual_paid');
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
        Schema::dropIfExists('fee_due_details');
    }
}
