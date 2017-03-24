<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() {
        // $this->call(UsersTableSeeder::class);

        DB::insert("INSERT INTO `categories` (`id`, `name`, `description`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cushions & Pillows', 'Cushions and Pillows 100% cotton or waterproof on request. We produce tailor-made cushions and pillows. ', 'thai-rattan-cushions-pillows', 'icon-pillow.png', '2017-03-01 00:00:00', '2017-03-05 00:00:00'),
(2, 'Chairs', 'Natural Rattan Dining Chairs, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-dining-chairs', 'icon-chair.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(3, 'Armchairs', 'Natural Rattan Armchairs, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-armchairs', 'icon-armchair.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(4, 'Big Armchairs', 'Natural Rattan Big Armchairs, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-big-armchairs', 'icon-big-armchair.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(5, 'Sofas', 'Natural Rattan Sofas, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-sofas', 'icon-sofa.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(6, 'Sofa sets', 'Natural Rattan Sofa sets, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-sofa-set', 'icon-sofa-set.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(7, 'Daybeds', 'Natural Rattan daybeds, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-daybeds', 'icon-daybed.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00'),
(8, 'Pouf & Tables', 'Natural Rattan Poufs and Ottomans, cushions 100% cotton. We produce custom made rattan furniture. ', 'thai-rattan-pouf-table', 'icon-pouf-table.png', '2017-03-05 00:00:00', '2017-03-05 00:00:00')");
    }
}
