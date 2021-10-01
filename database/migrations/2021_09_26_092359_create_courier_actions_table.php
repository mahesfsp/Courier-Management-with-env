<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('courier_id')->length(10)->unsigned();            
           // $table->date('action_date');
           $table->timestamp('action_date')->useCurrent();
            $table->string('remarks');
            $table->integer('days_remaining')->length(10)->unsigned(); 
            $table->integer('status_id')->length(10)->unsigned(); 
            $table->timestamps();
            $table->integer('updated_by')->length(10)->unsigned();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courier_actions');
    }
}
