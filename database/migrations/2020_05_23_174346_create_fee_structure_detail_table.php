<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeStructureDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structure_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('fee_payment_type');
            $table->string('fee_payment_desc');
            $table->integer('fee_payment_value');
            $table->integer('fee_structure_head_id');
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
        Schema::dropIfExists('fee_structure_detail');
    }
}
