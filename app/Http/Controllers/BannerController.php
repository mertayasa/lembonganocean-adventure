<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    const BANNER_FOLDER = 'banners';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(8);
        return view('backend.banner.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        try{
            $data = $request->validated();
            $image = uploadImageHttp($data['image'], self::BANNER_FOLDER);
            if($image != false){
                $data['image'] = $image;
            }else{
                return response()->json(['error' => 'Unable to upload your image'], 500);
            }

            Banner::create($data);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to save data'], 500);
        }

        Session::flash('success', 'Banner created successfully');
        return response()->json(['success' => 'Data saved successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $data_image = $banner->getImage();
        return view('backend.banner.edit', ['banner' => $banner, 'data_image' => $data_image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        try{
            $data = $request->validated();
            if(isset($data['image'])){
                $image = uploadImageHttp($data['image'], self::BANNER_FOLDER);
                if($image != false){
                    $data['image'] = $image;
                }else{
                    return response()->json(['error' => 'Unable to upload your image'], 500);
                }
            }

            $banner->update($data);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to save data'], 500);
        }
        Session::flash('success', 'Banner updated successfully');
        return response()->json(['success' => 'Data saved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        try{
            if(File::exists($banner->image)){
                File::delete($banner->image);
            }
            $banner->delete();
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to delete data'], 500);
        }
        Session::flash('success', 'Banner deleted successfully');
        return response()->json(['success' => 'Data deleted successfully'], 200);
    }
}
