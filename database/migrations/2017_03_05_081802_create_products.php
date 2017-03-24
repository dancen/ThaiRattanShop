<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {
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
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function($table) {
            $table->increments('id');
            $table->integer('category')->unsigned();
            $table->string('subcategory', 50);
            $table->string('name', 50)->unique();
            $table->string('description', 255);
            $table->string('width', 30);
            $table->string('depth', 30);
            $table->string('height', 30);
            $table->string('price', 20);
            $table->boolean('has_rattan');
            $table->boolean('has_wood');
            $table->boolean('has_metal');
            $table->boolean('has_fabric');
            $table->string('small_image', 100);
            $table->string('medium_image', 100);
            $table->string('big_image', 100);
            $table->text('additional');
            $table->string('slug', 100);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
        
               
        Schema::table('products', function($table) {
            $table->foreign('category')->references('id')->on('categories');
        });
    }

    // INSERT INTO `products` (`id`, `name`, `description`, `width`, `depth`, `height`, `price`, `has_rattan`, `has_wood`, `has_metal`, `has_fabric`, `small_image`, `medium_image`, `big_image`, `additional`, `created_at`, `updated_at`) VALUES (NULL, 'MRW-SED-06', 'Dining Chair available in 9 beautiful rattan colors and several fabric colors. Choose your colors and add to the shopping cart. Hurry! Your coupon is valid for 6 months. ', 'W. 65 cm - 25.6 inches', 'D. 65 cm - 25.6 inches', 'H. 92 cm - 36.2 inches', '7,000', '1', '0', '0', '1', 'mrw-sed-06-small.jpg', 'mrw-sed-06.jpg', 'mrw-sed-06.jpg', 'Every piece is unique and we can make any change in dimensions in order to suit your needs. We produce on order and we deliver normally in 20 days. The shipping service is free in Bangkok area. We can ship in all thailand ( islands included ). The shipping cost is calculated in the checkout. ', '2017-03-05 00:00:00', '2017-03-05 00:00:00');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('products');
    }

}
