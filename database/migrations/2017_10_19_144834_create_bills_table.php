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
            // $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('work_type');
            $table->integer('amount_of_order');
            $table->double('per_head_expense');
            $table->string('work_status');
            $table->integer('bill_paid');
            $table->integer('bill_deu');
            $table->string('bill_status');
            $table->date('bill_paid_date');
            $table->date('start_date');
            $table->date('deadline');
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
        Schema::table('bills', function(Blueprint $table){
            $table->dropForeign('bills_reference_id_foreign');
        });
        Schema::dropIfExists('bills');
    }
}
