<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'caption',
    ];

    public static function boot(){
        parent::boot();

        static::deleted(function($model)
        {
            $filename  = public_path($model->image);

            if (File::exists($filename)) {
                File::delete($filename);
            }
        });
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
