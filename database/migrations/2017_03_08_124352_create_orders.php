<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration {

     //php artisan make:migration create_(table name)
    //php artisan migrate
    //php artisan migrate:rollback
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('orders', function($table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('address', 255);
            $table->string('country', 50);
            $table->string('city', 50);
            $table->string('province', 50);
            $table->string('zip', 8);
            $table->text('instruction')->nullable();
            $table->string('delivery_area', 50);
            $table->integer('shipping_cost');
            $table->integer('total_amount');
            $table->string('payment_code', 100);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        
        Schema::drop('orders');
    }

}
