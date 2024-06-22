<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingImageGallery;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingImageGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listing = Listing::find(request()->id);
        $images = ListingImageGallery::where('listing_id', request()->id)->get();
        return view('admin.listing.image-gallery.index', compact('images', 'listing'));
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

        $request->validate([
            'images' => 'required',
            'images.*' => 'image|max:10000'
        ], [
            'images.*.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)',
            'images.*.max' => 'The file size must be less than 3MB'
        ]);

        $imagePath = $this->uploadMultipleImage($request, 'images');
        foreach ($imagePath as $img) {
            $image = new ListingImageGallery();
            $image->listing_id = $request->listing_id;
            $image->image = $img;
            $image->save();
        }

        Notify::success('Images uploaded successfully');
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
        $image = ListingImageGallery::findOrFail($id);
        $this->deleteFile($image->image);
        $image->delete();
        Notify::success('Image deleted successfully');
        return response()->json(['success' => true]);
    }
}