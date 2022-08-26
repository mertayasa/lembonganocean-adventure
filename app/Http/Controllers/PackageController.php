<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    const PACKAGE_FOLDER = 'packages';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->paginate(8);
        return view('backend.package.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        try{
            $data = $request->validated();
            $image = uploadImageHttp($data['image'], self::PACKAGE_FOLDER);
            if($image != false){
                $data['image'] = $image;
            }else{
                return response()->json(['error' => 'Unable to upload your image'], 500);
            }

            Package::create($data);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to save data'], 500);
        }

        Session::flash('success', 'Package created successfully');
        return response()->json(['success' => 'Data saved successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $data = [
            'package' => $package,
            'similiar_packages' => Package::where('id', '!=', $package->id)->inRandomOrder()->take(3)->get()
        ];

        return view('frontend.package.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $data_image = $package->getImage();
        return view('backend.package.edit', ['package' => $package, 'data_image' => $data_image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        try{
            $data = $request->validated();
            if(isset($data['image'])){
                $image = uploadImageHttp($data['image'], self::PACKAGE_FOLDER);
                if($image != false){
                    $data['image'] = $image;
                }else{
                    return response()->json(['error' => 'Unable to upload your image'], 500);
                }
            }

            $package->update($data);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to update data'], 500);
        }

        return response()->json(['success' => 'Data updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        try{
            if(File::exists($package->image)){
                File::delete($package->image);
            }

            $package->delete();
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to delete data'], 500);
        }

        return response()->json(['success' => 'Data deleted successfully'], 200);
    }
}
