<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenityDataTable $dataTable)
    {
        return $dataTable->render('admin.amenity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request)
    {
        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->status = $request->status;

        $amenity->save();
        Notify::success('Amenity created successfully!');
        return redirect()->route('admin.amenity.index');
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
        $amenity = Amenity::findOrFail($id);
        return view('admin.amenity.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amenity = Amenity::findOrFail($id);

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->status = $request->status;

        $amenity->save();

        Notify::success('Amenity updated successfully!');
        return redirect()->route('admin.amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();

        Notify::success('Amenity deleted successfully!');
        return response()->json(['success' => true]);
    }
}
