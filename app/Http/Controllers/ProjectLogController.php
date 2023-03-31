<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Group;
use App\Models\Heading;
use App\Models\HeadingRecord;
use App\Models\Location;
use App\Models\ProjectLog;
use App\Models\ProjectLogRecord;
use Illuminate\Http\Request;
use App\Services\SeoMozService;
use App\Services\GoogleAnalyticsService;
use DB;


class ProjectLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_columns = Heading::all()->sortBy('id');
        $project_logs = ProjectLog::all()->sortBy('id');

        $columns_data = [];
        foreach ($project_logs as $project_log) {
            foreach ($project_log->getProjectLogMaster as $projectLogMaster) {
                $group_column_records = HeadingRecord::where(['unique_row_num' => $projectLogMaster->unique_row_num])->get()->sortBy('id');
                foreach ($group_column_records as $group_column) {
                    $columns_data[$project_log->id][$group_column->heading_id] = $group_column->data;
                }
            }
        }

        return view('/admin/projectLog/index', compact('project_logs', 'group_columns', 'columns_data'));
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
        $projectLog = ProjectLog::findOrFail($request->project_log_id);

        $locations = Location::select("id")
            ->whereRaw("LCASE(name) = LCASE('{$request->location}')")
            ->first();

        if (is_null($locations)) {
            $locations = Location::create([
                'name' => $request->location,
            ]);
        }

        $location_id = (is_null($locations->id)) ? 0 : $locations->id;

        $projectLog->status = $request->status;
        $projectLog->location_id = $location_id;
        $projectLog->save();

        $projectLogRecord = ProjectLogRecord::where(['project_log_id' => $projectLog->id])->delete();
        if(!empty($request->group)) {
            foreach ($request->group as $group_id => $unique_row_num) {
                $projectLogRecord = ProjectLogRecord::where(['project_log_id' => $projectLog->id, 'group_id' => $group_id])->first();
                if (is_null($unique_row_num)) {
                    if (!is_null($projectLogRecord)) {
                        $data = ProjectLogRecord::find($projectLogRecord->id);
                        $data->delete();
                    }
                    continue;
                }
    
                $projectLogRecord = ProjectLogRecord::where(['project_log_id' => $projectLog->id, 'group_id' => $group_id, 'unique_row_num' => $unique_row_num])->first();
    
                if (is_null($projectLogRecord)) {
                    ProjectLogRecord::create([
                        'project_log_id' => $projectLog->id,
                        'group_id' => $group_id,
                        'unique_row_num' => $unique_row_num,
                    ]);
                }
            }
        }
        return redirect('domains')->with('success', 'Record save successfully.');
    }

    /**
     * Add and update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function addAndUpdate(Request $request) {

        // echo "<pre>";print_r($request->all());die;
        if(!empty($request->group)) {
            foreach ($request->group as $group_id => $unique_row_num) {
                $projectLogRecord = ProjectLogRecord::where(['project_log_id' => $request->projectLogId, 'group_id' => $group_id])->first();
                if (is_null($unique_row_num)) {
                    if (!is_null($projectLogRecord)) {
                        $data = ProjectLogRecord::find($projectLogRecord->id);
                        $data->delete();
                    }
                }
                $projectLogRecordData = ProjectLogRecord::where(['project_log_id' => $request->projectLogId, 'group_id' => $group_id, 'unique_row_num' => $unique_row_num])->first();
    
                if (is_null($projectLogRecordData)) {
                    if (!is_null($projectLogRecord)) {
                        $data = ProjectLogRecord::find($projectLogRecord->id);
                        $data->delete();
                    }
                    ProjectLogRecord::create([
                        'project_log_id' => $request->projectLogId,
                        'group_id' => $group_id,
                        'unique_row_num' => $unique_row_num,
                    ]);
                }
            }
        }
        return redirect('domains')->with('success', 'Record save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectLog  $projectLog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $selected_project_log_records = [];
        $groups = [];
        $listActiveUsers = [];
        $listEvents = [];
        $listScreenPageViews = [];
        $domain_id = $request->domain_id;
        $data = ProjectLog::where(['domain_id' => $domain_id])->with('getDomain')->first();
        if (is_null($data)) {
            ProjectLog::create([
                'domain_id' => $domain_id,
            ]);
            return redirect('project_logs/show?domain_id=' . $domain_id);
        }
        $googleAnalytics = new GoogleAnalyticsService($data->getDomain->name);
        if (!empty($googleAnalytics->propertyId) && !empty($googleAnalytics->credentialFileName) && 0) {
            $listActiveUsers = $googleAnalytics->listActiveUsers();
            $listEvents = $googleAnalytics->listEvents();
            $listScreenPageViews = $googleAnalytics->listScreenPageViews();
        }
        $all_groups = Group::all();
        $project_log_records = ProjectLogRecord::where(['project_log_id' => $data->id])->get();
        foreach ($project_log_records as $project_log_master) {
            $selected_project_log_records[] = $project_log_master->unique_row_num;
        }
        foreach ($all_groups as $group) {
            $data_columns = [];
            foreach ($group->getHeadingRecords as $record) {
                if ($record->group_id == $group->id) {
                    $data_columns[$record->unique_row_num][$record->heading_id] = $record->data;
                }
            }

            foreach ($data_columns as $key => $data_column) {
                if (empty($data_column)) {
                    unset($data_columns[$key]);
                }
            }

            if (empty($data_columns)) {
                continue;
            }

            $headings = [];
            $groups[$group->id]['id'] = $group->id;
            $groups[$group->id]['name'] = $group->name;
            foreach ($group->getHeadings as $column) {
                $headings[] = $column->name;
            }

            $groups[$group->id]['headings'] = implode(', ', $headings);
            $groups[$group->id]['records'] = $data_columns;
        }
       
        return view('pages.projectLog.edit_projectLog',compact('data', 'groups', 'selected_project_log_records','listActiveUsers','listEvents','listScreenPageViews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectLog  $projectLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectLog $projectLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectLog  $projectLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectLog $projectLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectLog  $projectLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectLog $projectLog)
    {
        //
    }

    public function getKeywordInformation(Request $request) {
        $selectedProjectLogRecords = [];
        $totalUsedValue = [];
        $customArray = [];
        $selectedGroupRecode = [];
        $domain_id = $request->domain_id;
        $data = ProjectLog::where(['domain_id' => $domain_id])->with('getDomain')->first();
        $groupHeading = HeadingRecord::orderBy('data', 'asc')->where(['group_id' => $request->group_id])->get()->toArray();
        $fillArrayofGroupHeadingRecord = ProjectLogRecord::where(['group_id' => $request->group_id])->select('unique_row_num',DB::raw('count(*) as totalUsed'))->groupBy('unique_row_num')->get()->toArray();
        if(!empty($fillArrayofGroupHeadingRecord)) {
            foreach($fillArrayofGroupHeadingRecord as $result) {
                $totalUsedValue[$result['unique_row_num']] = $result['totalUsed'];
            }
        }
        $selectedGroupRecode = ProjectLogRecord::where(['project_log_id' => $data->id,'group_id' => $request->group_id])->select('unique_row_num')->get()->toArray();
        $customArray['group_id'] = $request->group_id;
        // echo "<pre>";print_r($selectedGroupRecode);die;
        return view('pages.projectLog.customGroup._groupInformationAjax',compact('groupHeading', 'selectedGroupRecode','totalUsedValue','customArray'));
    }

    public function addGroupInformation(Request $request) {
        $group = Group::findOrFail($request->group_id);
        $headings = Heading::where(['group_id' => $group->id])->get()->sortby('id');
        return view('pages.projectLog.customGroup._creategroupInformationAjax', compact('headings', 'group'));
    }
}
