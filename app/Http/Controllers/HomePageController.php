<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $banners = Banner::all();
        $galleries = Gallery::latest()->get();

        $data = [
            'packages' => $packages,
            'banners' => $banners,
            'galleries' => $galleries
        ];

        return view('frontend.homepage.index', $data);
    }
}
