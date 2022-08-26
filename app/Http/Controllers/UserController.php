<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('backend.profile.edit', ['user' => $user]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
            $data = $request->validated();
            if(isset($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }

            Auth::user()->update($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Failed to update profile'], 500);
        }

        Session::flash('success', 'Profile updated successfully');
        return response()->json(['message' => 'Profile updated successfully'], 200);
    }
}
