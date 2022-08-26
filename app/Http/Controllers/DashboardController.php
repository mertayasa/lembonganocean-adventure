<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\Ekskul;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $dashboard_data = $this->generateDashboardData();
        return view('dashboard.index', compact('dashboard_data'));
    }

    public function generateDashboardData()
    {
        $dashboard_data = [
        ];

        return $dashboard_data;
    }

    public function pengumuman()
    {
        return view('dashboard.pengumuman');
    }
}
