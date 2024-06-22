<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\ListingSchedule;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingScheduleDataTable $dataTable)
    {
        $listing = Listing::where('id', request()->id)->first();
        return $dataTable->render('admin.listing.schedule.index', compact('listing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listing = Listing::where('id', request()->id)->first();
        return view('admin.listing.schedule.create', compact('listing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = request()->id;

        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule = new ListingSchedule();
        $schedule->listing_id = $id;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        Notify::success('Schedule added successfully!');
        return redirect()->route('admin.listing-schedule.index', ['id' => $id]);
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
        $schedule = ListingSchedule::find($id);
        $listing = Listing::where('id', $schedule->listing_id)->first();
        return view('admin.listing.schedule.edit', compact('schedule', 'listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = ListingSchedule::find($id);
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        Notify::success('Schedule updated successfully!');
        return redirect()->route('admin.listing-schedule.index', ['id' => $schedule->listing_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = ListingSchedule::find($id);
        $schedule->delete();

        Notify::success('Schedule deleted successfully!');
        return response()->json(['success' => true]);
    }
}