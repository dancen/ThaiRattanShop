<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchases extends Migration
{
    //cd C:\Apache24\htdocs\sites\thairattan2\e-shop\laravel
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
         Schema::enableForeignKeyConstraints();
         Schema::create('purchases', function($table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('discount')->nullable();
            $table->string('coupon',10)->nullable();
            $table->text('product');
            $table->integer('quantity');
            $table->string('rattan_color',50)->nullable();
            $table->string('fabric_color',50)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();            
        });
        
                
         Schema::table('purchases', function($table) {
            $table->foreign('order_id')->references('id')->on('orders');
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
         Schema::drop('purchases');
    }
}
