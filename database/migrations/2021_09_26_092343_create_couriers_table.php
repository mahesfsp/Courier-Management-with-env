<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->length(10)->unsigned();
            $table->integer('tracking_no')->length(10)->unsigned();
            $table->string('sender_name');
            $table->string('sender_contact');
            $table->text('sender_address');          
            $table->string('sender_city');
            $table->string('sender_state');
            $table->string('sender_pin');
            $table->string('sender_country');
            $table->string('recipient_name');            
            $table->string('recipient_contact');            
            $table->string('recipient_address');         
            $table->string('recipient_city');  
            $table->string('recipient_state');
            $table->string('recipient_pin');
            $table->string('recipient_country');
            $table->text('courier_desc');
            $table->decimal('weight',10,6)->default(0);
            $table->decimal('lenght',10,6)->nullable();
            $table->decimal('breadth',10,6)->nullable();
            $table->decimal('height',10,6)->nullable();         
            $table->decimal('price',10,6)->default(0);
            $table->string('from_location');            
            $table->string('to_location');         
            $table->integer('package_id');
            $table->integer('created_by')->length(10)->unsigned();
            $table->integer('updated_by')->length(10)->unsigned();                     
            $table->rememberToken();
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
        Schema::dropIfExists('couriers');
    }
}
