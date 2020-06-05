<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDueHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_due_headers', function (Blueprint $table) {
            $table->id();
            $table->integer('fee_due_id');
            $table->string('fee_type');
            $table->string('fee_value');
            $table->string('fee_paid');
            $table->string('fee_balance');
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
        Schema::dropIfExists('fee_due_headers');
    }
}
