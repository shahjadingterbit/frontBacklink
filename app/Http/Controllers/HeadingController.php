<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Heading;
use App\Models\HeadingRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group = Group::findOrFail($request->group_id);

        $permission_for = str_replace(' ', '_', strtolower($group->name));

        $headings = Heading::where(['group_id' => $group->id])->get()->sortby('id')->toArray();

        $heading_records = HeadingRecord::where(['group_id' => $group->id])->get()->sortby('id')->toArray();

        $records = [];
        foreach ($heading_records as $heading_record) {
            $records[$heading_record['unique_row_num']][$heading_record['heading_id']] = $heading_record['data'];
        }


        return view('/pages/groupHeadings/index', compact('group', 'headings', 'permission_for', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);

        dd($group);
        // Auth::user()->can();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function edit(Heading $heading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heading $heading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heading $heading)
    {
        //
    }
}
