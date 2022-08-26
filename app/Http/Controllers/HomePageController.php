<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Package;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $banners = Banner::all();
        $data = [
            'packages' => $packages,
            'banners' => $banners,
        ];

        return view('frontend.homepage.index', $data);
    }
}
