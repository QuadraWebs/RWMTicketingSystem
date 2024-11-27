<?php

namespace Database\Seeders;

use App\Models\Cafe;
use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    public function run()
    {
        $cafes = [
            [
                'name' => 'Le Fragrant Cafe',
                'address' => 'Jalan 20/7, Taman Paramount, 46300 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Pages Book Cafe',
                'address' => 'F-G-43, Taipan Damansara 2, Jalan PJU 1a/3, Ara Damansara, 47301 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'One Afternoon Cafe',
                'address' => 'Lot S28 Level 2, Atria Shopping Gallery, Jalan SS 22/23, Damansara Jaya, 47400 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'District 13 by 缔',
                'address' => 'B-G, 12A, Jalan PJU 1/43, Aman Suria, 47301 Petaling Jaya, Selangor'
            ],
            [
                'name' => "Darling's Cafe",
                'address' => 'A-02, Level 2 Block A, Suite, PJ8 Services, Jalan Barat, Seksyen 8 Petaling Jaya, 46050 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Digital Nomad House KL Bukit Bintang',
                'address' => '〒50250 Federal Territory of Kuala Lumpur, Kuala Lumpur, Bukit Bintang, Jln Sultan Ismail'
            ],
            [
                'name' => 'Zhufu Cafe & Event Space',
                'address' => '43a, Jln SS 24/8, Taman Megah, 47301 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'POOF Cafe',
                'address' => 'Lot no 2-12, Level 2, Megah Rise Mall, Jln Ss 24, Taman Megah, 47301 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Lolla Paluza',
                'address' => '2A, Jalan 21/19a, Sea Park, 46300 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Asa Cafe',
                'address' => '19, Jalan 20/7, Taman Paramount, 46300 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Niju Coffee Hub',
                'address' => 'No 20, Mezzanine Floor, Jalan SS 2/61, SS 2, 47300 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Koffeekaw Cafe',
                'address' => 'Lot G19, G20 & G21, Ground Floor, Strand Mall, Jalan PJU 5/23, Kota Damansara, 47810 Petaling Jaya, Selangor'
            ],
            [
                'name' => 'Good Blue Men',
                'address' => 'AG-01, Ground Floor,Block A, Happy Mansion, Jalan 17/13, Seksyen 17, 46400 Petaling Jaya, Selangor'
            ]
        ];

        foreach ($cafes as $cafe) {
            Cafe::create($cafe);
        }
    }
}
