<?php

use Illuminate\Database\Seeder;

class DeliveriesSeeder extends Seeder {
    
    //php artisan make:seeder (class name)
    //php artisan db:seed --class=(class name)

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);

        DB::insert("INSERT INTO `deliveries` (`id`, `area`, `distance`, `disadvantaged`, `created_at`, `updated_at`) VALUES
(1, 'Bangkok', 0, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(2, 'Nakhon Pathom', 56, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(3, 'Nonthaburi', 19, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(4, 'Pathum Thani', 40, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(5, 'Samut Prakan', 33, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(6, 'Samut Sakhon', 47, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(7, 'Ang Thong', 105, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(8, 'Chainat', 193, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(9, 'Lopburi', 153, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(10, 'Phra Nakhon Si Ayutthaya', 81, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(11, 'Saraburi', 113, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(12, 'Sing Buri', 141, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(13, 'Chachoengsao', 85, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(14, 'Chanthaburi', 250, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(15, 'Chonburi', 87, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(16, 'Nakhon Nayok', 112, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(17, 'Prachinburi', 184, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(18, 'Rayong', 176, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(19, 'Sa Kaeo', 198, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(20, 'Trat', 320, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(21, 'Amnat Charoen', 590, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(22, 'Bueng Kan', 753, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(23, 'Buriram', 393, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(24, 'Chaiyaphum', 336, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(25, 'Kalasin', 521, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(26, 'Khon Kaen', 450, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(27, 'Loei', 543, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(28, 'Maha Sarakham', 456, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(29, 'Mukdahan', 655, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(30, 'Nakhon Phanom', 737, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(31, 'Nakhon Ratchasima', 260, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(32, 'Nong Bua Lamphu', 528, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(33, 'Nong Khai', 623, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(34, 'Roi Et', 514, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(35, 'Sakon Nakhon', 650, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(36, 'Sisaket', 539, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(37, 'Surin', 433, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(38, 'Ubon Ratchathani', 615, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(39, 'Udon Thani', 450, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(40, 'Yasothon', 534, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(41, 'Chiang Mai', 688, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(42, 'Chiang Rai', 790, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(43, 'Kamphaeng Phet', 354, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(44, 'Lampang', 600, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(45, 'Lamphun', 664, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(46, 'Mae Hong Son', 882, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(47, 'Nakhon Sawan', 237, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(48, 'Nan', 670, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(49, 'Phayao', 726, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(50, 'Phetchabun', 355, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(51, 'Phichit', 331, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(52, 'Phitsanulok', 377, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(53, 'Phrae', 554, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(54, 'Sukhothai', 427, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(55, 'Tak', 418, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(56, 'Uthai Thani', 220, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(57, 'Uttaradit', 485, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(58, 'Chumphon', 468, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(59, 'Krabi', 782, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(60, 'Nakhon Si Thammarat', 783, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(61, 'Narathiwat', 1140, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(62, 'Pattani', 1050, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(63, 'Phang Nga', 761, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(64, 'Phattalung', 850, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(65, 'Phuket', 862, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(66, 'Ranong', 586, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(67, 'Satun', 985, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(68, 'Songkhla', 960, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(69, 'Surat Thani', 643, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(70, 'Trang', 840, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(71, 'Yala', 1070, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(72, 'Kanchanaburi', 143, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(73, 'Prachuap Khiri Khan', 291, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(74, 'Phetchaburi', 168, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(75, 'Ratchaburi', 99, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(76, 'Samut Songkhram', 81, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00'),
(77, 'Suphan Buri', 100, 0, '2017-03-06 00:00:00', '2017-03-06 00:00:00')");
    }

}