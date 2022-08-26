<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'image' => 'frontend/img/banner4.jpg',
                'title' => 'Pandu Wisata Tour Lembongan',
                'caption' => 'Enjoy your trip with us',
                'link' => 'https://panduwisatatour.com',
                'button_text' => 'Learn More',
            ],
            [
                'image' => 'frontend/img/banner3.jpg',
                'title' => 'Snorkeling Trip',
                'caption' => 'Enjoy your snorkeling trip with us',
                'link' => 'https://panduwisatatour.com',
                'button_text' => 'Go Snorkeling',
            ],
            [
                'image' => 'frontend/img/banner2.jpg',
                'title' => 'Let\'s Go Tour Island',
                'caption' => 'Enjoy your tour island with us',
                'link' => 'https://panduwisatatour.com',
                'button_text' => 'Go Around Island',
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
