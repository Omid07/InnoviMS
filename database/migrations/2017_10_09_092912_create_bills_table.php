<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('work_type');
            $table->integer('amount_of_order');
            $table->double('per_head_expense');
            $table->string('work_status');
            $table->integer('bill_paid');
            $table->integer('bill_due');
            $table->string('bill_status');
            $table->date('start_date');
            $table->date('deadline_date');
            $table->date('bill_paid_date');
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
        Schema::dropIfExists('bills');
    }
}
