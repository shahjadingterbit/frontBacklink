<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DomainAssignedGroup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index($domainId)
    {
        $data = [];
        $domainDetail = Http::get($this->endpoint_url . '/domains/' . $domainId);
        $domainInformation = $domainDetail->json();
        // echo "<pre>";print_r($domainInformation);die;

        $response = Http::get($this->endpoint_url . '/domainAssignedGroup/' . $domainId);
        $domainGroupList = $response->json();
        $data['domainId'] =  $domainId ?? '';
        $data['domainName'] =  $domainInformation[0]['domain'] ?? '';
        if ($response->status() == 200) {
            $data['domainGroupList'] =  $domainGroupList;
        } else {
            $data['domainGroupList'] =  [];
        }
        return view('pages.domain.group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $response = Http::delete($this->endpoint_url . '/backlinks/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('backlinks');
        }
    }
    public function assign($domainId)
    {
        $assignedGroupIds = [];
        $data = [];
        $domainDetail = Http::get($this->endpoint_url . '/domains/' . $domainId);
        $domainInformation = $domainDetail->json();
        $data['domainId'] =  $domainId ?? '';
        $data['domainName'] =  $domainInformation[0]['domain'] ?? '';
        $allgroups = Http::get($this->endpoint_url . '/groupAssignedBacklink/groupListHasBacklinks');
        $allGroupList = $allgroups->json();
        $response = Http::get($this->endpoint_url . '/domainAssignedGroup/' . $domainId);
        $domainGroupList = $response->json();

        $data['allGroupList'] =  $allGroupList ?? [];
        if ($response->status() == 200 && !empty($domainGroupList)) {
            foreach ($domainGroupList as $row) {
                $assignedGroupIds[] = $row['group_id'];
            }
        }
        $data['assignedGroupIds'] =  $assignedGroupIds;
        $data['domainGroupList'] =  $domainGroupList ?? [];
        return view('pages.domain.group.all_group_list', $data);
    }

    public function addAndUpdate(Request $request)
    {
        $data = [];
        $data['domain_id'] = $request->domain_id;
        if (!empty($request->group)) {
            $data['group_ids'] = $request->group;
        } else {
            $data['group_ids'] = array();
        }
        // echo "<pre>";print_r($data);die;
        if ($request->method == 'PUT') {
            $response = Http::put($this->endpoint_url . '/domainAssignedGroup/updateGroupFromDomain', $data);
        } else {
            $response = Http::post($this->endpoint_url . '/domainAssignedGroup/assignGroupToDomain', $data);
        }
        $jsonData = $response->json();
        if ($response->status() == 200) {
            return redirect()->intended('domains/groups/' . $request->domain_id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['backlink_domain'] = $request->backlink_domain;
        $data['type'] = $request->type;
        $data['black_list'] = 0;
        $response = Http::post($this->endpoint_url . '/backlinks/addBacklink', $data);
        $jsonData = $response->json();
        if ($jsonData['status']) {
            return redirect()->intended('backlinks');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->endpoint_url . '/backlinks/' . $id);
        $backlinkData = $response->json();
        return view('pages.backlink.edit_backlink', compact('backlinkData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['id'] = $request->backlink_id;
        $data['backlink_domain'] = $request->backlink_domain;
        $data['type'] = $request->type;
        $response = Http::put($this->endpoint_url . '/backlinks/updateBacklink', $data);
        $jsonData = $response->json();
        if ($jsonData['status']) {
            return redirect()->route('backlinks.index')->with('success', 'Backlink has been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->endpoint_url . '/backlinks/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('backlinks');
        }
    }
}
