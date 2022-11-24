<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('frontend/img/ocean');
        $files = File::files($path);
        foreach ($files as $key => $file) {
            Gallery::create([
                'image' => 'frontend/img/ocean/' . File::name($file) . '.' . File::extension($file)
            ]);
        }
    }
}
