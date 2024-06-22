<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\ListingVideoGallery;
use App\Traits\FileUploadTrait;

class ListingVideoGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = ListingVideoGallery::where('listing_id', request()->id)->get();
        $listing = Listing::where('id', request()->id)->first();
        return view('admin.listing.video-gallery.index', compact('videos', 'listing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->video != null) {
            $videoPath = $this->uploadImage($request, 'video');
        }

        if($request->video_url != null){
            $videoPath = $request->video_url;
        }

        $listing_video = new ListingVideoGallery();
        $listing_video->listing_id = $request->listing_id;
        $listing_video->video = $videoPath;
        $listing_video->save();

        Notify::success('Video added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = ListingVideoGallery::where('id', $id)->first();

        if ($video->video != null) {
            $this->deleteFile($video->video);
        }

        $video->delete();

        Notify::success('Video deleted successfully');
        return response()->json(['success' => true]);
    }
}