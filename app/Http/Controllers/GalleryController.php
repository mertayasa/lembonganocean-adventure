<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    const GALLERY_FOLDER = 'galleries';

    public function galleryList()
    {
        $galleries = Gallery::latest()->get();
        return view('frontend.gallery.index', [
            'galleries' => $galleries
        ]);
    }

    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('backend.gallery.index', [
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(GalleryRequest $request)
    {
        try{
            $data = $request->validated();
            $image = uploadImageHttp($data['image'], self::GALLERY_FOLDER);
            if($image != false){
                $data['image'] = $image;
            }else{
                return response()->json(['error' => 'Unable to upload your image'], 500);
            }

            Gallery::create($data);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to save data'], 500);
        }

        Session::flash('success', 'Gallery created successfully');
        return response()->json(['success' => 'Data saved successfully'], 200);
    }

    public function destroy(Gallery $gallery)
    {
        try{
            $gallery->delete();
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to delete data'], 500);
        }
        Session::flash('success', 'Gallery deleted successfully');
        return response()->json(['success' => 'Data deleted successfully'], 200);
    }
}
