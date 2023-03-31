<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Heading;
use App\Models\HeadingRecord;
use Illuminate\Http\Request;

class HeadingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group = Group::findOrFail($request->group_id);
        $headings = Heading::where(['group_id' => $group->id])->get()->sortby('id');
        return view('pages/groupHeadings/add/create', compact('headings', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = Group::findOrFail($request->group_id);
        $unique_row_num = uniqid();

        foreach ($request->records as $heading_id => $record) {
            HeadingRecord::Create([
                'group_id' => $group->id,
                'heading_id' => $heading_id,
                'unique_row_num' => $unique_row_num,
                'data' => trim($record),
            ]);
        }

        return $group->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeadingRecord  $headingRecord
     * @return \Illuminate\Http\Response
     */
    public function show(HeadingRecord $headingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeadingRecord  $headingRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $unique_row_num = $request['unique_row_num'];
        $headingList = [];
        $heading_records = HeadingRecord::where(['unique_row_num' => $request->unique_row_num])->get()->toArray();
        $group_id = 0;
        if(!empty($heading_records)) {
            $group_id = $heading_records[0]['group_id'];
        }
        foreach($heading_records as $row) {
            $headingList[$row['heading_id']] = $row['data'];
        }
        $group = Group::findOrFail($group_id);
        $headings = Heading::where(['group_id' => $group_id])->get()->sortby('id')->toArray();

        return view('pages/groupHeadings/edit_heading', compact('headings', 'headingList', 'group', 'unique_row_num'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeadingRecord  $headingRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unique_row_num)
    {
        $group = Group::findOrFail($request->group_id);

        $records = $request->records;

        foreach ($records as $heading_id => $data) {
            $heading_records = HeadingRecord::where(['unique_row_num' => $unique_row_num, 'heading_id' => $heading_id, 'group_id' => $group->id])->first();
            if (is_null($heading_records)) {
                HeadingRecord::create([
                    'group_id' => $group->id,
                    'heading_id' => $heading_id,
                    'unique_row_num' => $unique_row_num,
                    'data' => trim($data),
                ]);
            } else {
                $update_heading_record = HeadingRecord::find($heading_records->id);

                $update_heading_record->data = trim($data);

                $update_heading_record->save();
            }
        }

        return  $group->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeadingRecord  $headingRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($unique_row_num)
    {
        $heading_records = HeadingRecord::where(['unique_row_num' => $unique_row_num])->get();

        $heading_records_ids = [];
        $group_id = 0;
        foreach ($heading_records as $heading_record) {
            $group_id = $heading_record->group_id;
            $heading_records_ids[] = $heading_record->id;
        }
        HeadingRecord::whereIn('id', $heading_records_ids)->delete();
        return redirect()->route('groups.headings', ['group_id' => $group_id])->with(['success' => 'Record Deleted successfully.',]);
    }
}
