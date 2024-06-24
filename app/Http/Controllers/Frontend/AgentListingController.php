<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AgentListingStoreRequest;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Models\ListingVideoGallery;
use App\Models\ListingSchedule;
use App\Models\Location;
use App\Models\Amenity;
use App\Models\ListingAmenity;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentListingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listingActive = Listing::where('user_id', auth()->id())->where('status', 1)->orderBy('id', 'DESC')->get();
        $listingPending = Listing::where('user_id', auth()->id())->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('frontend.dashboard.listing.index', compact('listingActive', 'listingPending'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $locations = Location::where('status', 1)->get();
        $amenities = Amenity::where('status', 1)->get();
        return view('frontend.dashboard.listing.create', compact('categories', 'locations', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentListingStoreRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailPath = $this->uploadImage($request, 'thumbnail');
        $attachmentPath = $this->uploadImage($request, 'attachment');

        $listing = new Listing();

        $listing->user_id = Auth::id();
        $listing->category_id = $request->category_id;
        $listing->location_id = $request->location_id;
        $listing->package_id = 0;

        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnailPath;

        $listing->title = $request->title;
        $listing->email = $request->email;
        $listing->phone = $request->phone;
        $listing->address = $request->address;
        $listing->website = $request->website;
        $listing->facebook = $request->facebook;
        $listing->linkedin = $request->linkedin;
        $listing->twitter = $request->twitter;
        $listing->instagram = $request->instagram;
        $listing->google_embed_map = $request->google_embed_map;
        $listing->description = $request->description;
        $listing->file = $attachmentPath;
        $listing->seo_title = $request->meta_title;
        $listing->seo_description = $request->meta_description;
        $listing->expire_date = date('Y-m-d');
        $listing->status = $request->status;
        $listing->is_approved = 0;
        $listing->is_featured = 0;
        $listing->status = $request->status;
        $listing->save();

        foreach ($request->amenities as $item) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $item;
            $amenity->save();
        }

        Notify::success('Listing created successfully!');
        return redirect()->route('listing.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::findOrFail($id);
        $listingImageGallery = ListingImageGallery::where('listing_id', $id)->get();
        $listingVideoGallery = ListingVideoGallery::where('listing_id', $id)->get();
        $listingSchedule = ListingSchedule::where('listing_id', $id)->get();
        return view('frontend.dashboard.listing.show', compact('listing', 'listingImageGallery', 'listingVideoGallery', 'listingSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $locations = Location::where('status', 1)->get();
        $amenities = Amenity::where('status', 1)->get();
        return view('frontend.dashboard.listing.edit', compact('listing', 'categories', 'locations', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $listing = Listing::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $request->old_image);
        $thumbnailPath = $this->uploadImage($request, 'thumbnail', $request->old_thumbnail);
        $attachmentPath = $this->uploadImage($request, 'attachment', $request->old_attachment);

        $listing->user_id = Auth::id();
        $listing->package_id = 0;
        $listing->category_id = $request->category_id;
        $listing->location_id = $request->location_id;

        $listing->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $listing->thumbnail_image = !empty($thumbnailPath) ? $thumbnailPath : $request->old_thumbnail;

        $listing->title = $request->title;
        $listing->email = $request->email;
        $listing->phone = $request->phone;
        $listing->address = $request->address;
        $listing->website = $request->website;
        $listing->facebook = $request->facebook;
        $listing->linkedin = $request->linkedin;
        $listing->twitter = $request->twitter;
        $listing->instagram = $request->instagram;
        $listing->google_embed_map = $request->google_embed_map;
        $listing->description = $request->description;
        $listing->file = !empty($attachmentPath) ? $attachmentPath : $request->old_attachment;
        $listing->seo_title = $request->meta_title;
        $listing->seo_description = $request->meta_description;
        $listing->expire_date = date('Y-m-d');
        $listing->status = $request->status;
        $listing->is_approved = 1;
        $listing->is_featured = $request->is_featured;
        $listing->save();

        ListingAmenity::where('listing_id', $listing->id)->delete();
        foreach ($request->amenities as $item) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $item;
            $amenity->save();
        }

        Notify::success('Listing updated successfully!');
        return redirect()->route('listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $listing = Listing::findOrFail($id);
            $this->deleteFile($listing->image);
            $this->deleteFile($listing->thumbnail_image);
            $this->deleteFile($listing->file);
            $listing->delete();
            Notify::success('Listing deleted successfully!');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}