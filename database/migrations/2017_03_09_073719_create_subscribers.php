<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribers extends Migration
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
        Schema::create('subscribers', function($table) {
            $table->increments('id');            
            $table->string('email', 50);
            $table->string('coupon', 10);
            $table->string('coupon_type',30);
            $table->boolean('sent');
            $table->boolean('used');
            $table->boolean('expired');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
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
        Schema::drop('subscribers');
    }
}
