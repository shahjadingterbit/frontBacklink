<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use App\DataTables\LocationDataTable;

class LocationController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LocationDataTable $dataTable)
    {
        return $dataTable->render('pages.locations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.locations.add.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2|unique:locations',
        ]);
        // Create the location
        if (Location::create(['name' => $request->name])) {
            return  redirect()->route('locations.index')->with('success', 'Location has been updated.');
        } else {
            return  redirect()->route('locations.index')->with('success', 'Location has been updated.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $location = Location::findOrFail($location->id);

        return view('pages.locations.edit_location', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2|unique:locations,name,' . $location->id,
        ]);

        // Get the location
        $location = Location::findOrFail($location->id);

        // Update location
        $location->fill(['name' => $request->name]);

        $location->save();
        return redirect()->route('locations.index')->with('success', 'Location has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        return Location::findOrFail($location->id)->delete();
    }
}
