<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Package extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'price_start',
        'price_end',
        'short_description',
        'full_description',
        'image',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage()
    {
        $image_path = $this->attributes['image'];
        $isExists = File::exists(public_path($image_path));
        if ($isExists and $this->attributes['image'] != '') {
            return asset($image_path);
        } else {
            return asset('image-default.png');
        }
    }
}
