<?php

use Illuminate\Database\Seeder;

class SubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);

        DB::insert("INSERT INTO `subscribers` (`id`, `email`, `coupon`, `sent`, `used`, `expired`, `created_at`, `updated_at`, `coupon_type`) VALUES
(1, 'daniele.centamore@gmail.com', '123456', 1, 0, 0, '2017-03-07 00:00:00', '2017-03-21 14:11:39', 'TOP')");
    }
}
