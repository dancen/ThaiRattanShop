<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DeliveriesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubscribersSeeder::class);
        $this->call(ProductsSeeder::class);         
    }
}
