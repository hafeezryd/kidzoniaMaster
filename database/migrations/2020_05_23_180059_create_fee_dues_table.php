<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_dues', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('fee_structure_head_id');
            $table->integer('fee_value');
            $table->integer('fee_paid');
            $table->integer('fees_balance');
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
        Schema::dropIfExists('fee_dues');
    }
}
