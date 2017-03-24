<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration
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
        
         Schema::create('categories', function($table) {
            $table->increments('id');             
            $table->string('name', 50);
            $table->string('description', 255);
            $table->string('slug', 100);
            $table->string('image', 100);
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
          Schema::drop('categories');
    }
}
