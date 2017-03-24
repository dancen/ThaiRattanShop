<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveries extends Migration
{
     //php artisan make:migration create_(table name)
    //php artisan migrate
    //php artisan migrate:rollback
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
         Schema::create('deliveries', function($table) {
            $table->increments('id');            
            $table->string('area', 50);
            $table->integer('distance');
            $table->boolean('disadvantaged');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('deliveries');
    }
}
