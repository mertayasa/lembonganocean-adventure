<?php

use App\Models\TahunAjar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

function formatPrice($value)
{
    $dec_place = is_float($value) ? 2 : 0;
    return number_format($value, $dec_place, ',', '.');
}

function isActive($param)
{
    if (is_array($param)) {
        foreach ($param as $par) {
            if (Request::route()->getPrefix() == '/' . $par) {
                return 'active';
            }
        }
    } else {
        return Request::route()->getPrefix() == '/' . $param ? 'active' : '';
    }

    return '';
}

function showFor($roles)
{
    foreach ($roles as $role) {
        if (roleName() == $role) {
            return true;
        }
    }

    return false;
}

function roleName($level = null)
{
    $role_name = ($level ?? Auth::user()->level) == User::$admin ? 'admin' : (($level ?? Auth::user()->level) == User::$guru ? 'guru' : User::$ortu);

    return $role_name;
}

function authUser()
{
    return Auth::user();
}

function indonesianDate($date)
{
    return Carbon::parse($date)->isoFormat('LL');
}

function getAge($date)
{
    $birth_date = Carbon::parse($date);
    $now = Carbon::now();

    return $birth_date->diffInYears($now);
}

function isLokal($gender)
{
    return $gender == 'true' ? 'Muatan Lokal' : 'Bukan Muatan Lokal';
}

function getStatus($status)
{
    return $status == 1 ? '<span class="badge badge-primary">Aktif</span>' : '<span class="badge badge-secondary">Nonaktif</span>';
}

function uploadFile($base_64_foto, $folder)
{
    try {
        $foto = base64_decode($base_64_foto['data']);
        $folderName = 'images/' . $folder;

        if (!file_exists($folderName)) {
            mkdir($folderName, 0755, true);
        }

        $safeName = time() . $base_64_foto['name'];
        $inventoriePath = public_path() . '/' . $folderName;
        file_put_contents($inventoriePath . '/' . $safeName, $foto);
    } catch (Exception $e) {
        Log::info($e->getMessage());
        return 0;
    }

    return $folder . '/' . $safeName;
}

function getDayCode($day)
{
    switch(strtolower($day)){
        case 'senin':
            return 1;
        break;
        case 'selasa':
            return 2;
        break;
        case 'rabu':
            return 3;
        break;
        case 'kamis':
            return 4;
        break;
        case 'jumat':
            return 5;
        break;
        case 'sabtu':
            return 6;
        break;
        case 'minggu':
            return 7;
        break;
    }
}

function getHari()
{
    return [
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
    ];
}

function uploadImageHttp($file, $folder = 'uploaded')
{
    $destinationPathImage = 'images/'. $folder;

    if (!file_exists(public_path($destinationPathImage))) {
        mkdir(public_path($destinationPathImage), 0755, true);
    }

    // Get file extension
    $extension = $file->getClientOriginalExtension();
    $filename = $file->getClientOriginalName();

    // Get file extension
    $extension = $file->getClientOriginalExtension();
    $filename = $file->getClientOriginalName();

    // return $filename;
    $original_name = pathinfo($filename, PATHINFO_FILENAME);


    // Valid extensions
    $validextensions = array('jpeg','png','jpg','gif','svg');

    if(in_array(strtolower($extension), $validextensions)){
        // Rename file
        $fileNameImages = time().str_replace(' ', '_', $original_name) .'.' . $extension;
        // Uploading file to given path
        $file->move(public_path($destinationPathImage), $fileNameImages);
        return '/'.$destinationPathImage.'/'.$fileNameImages;
    }

    return false;
}
