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
    public function index($group_id)
    {
        $data = [];
        $groupDetail = Http::get($this->endpoint_url . '/groups/' . $group_id);
        $groupInformation = $groupDetail->json();
        $response = Http::get($this->endpoint_url . '/groupAssignedBacklink/' . $group_id);
        $groupBacklinkList = $response->json();
        $data['groupId'] =  $group_id ?? '';
        $data['groupName'] =  $groupInformation['group_name'] ?? '';
        $data['groupBacklinkList'] =  $groupBacklinkList ?? [];
        return view('pages.group.backlinks.index', $data);
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
    public function assign($groupId)
    {
        $data = [];
        $assignedBacklinkIds = [];
        $groupDetail = Http::get($this->endpoint_url . '/groups/' . $groupId);
        $groupInformation = $groupDetail->json();
        $allbanklinks = Http::get($this->endpoint_url . '/backlinks');
        $allBacklinkList = $allbanklinks->json();
        $response = Http::get($this->endpoint_url . '/groupAssignedBacklink/' . $groupId);
        $groupBacklinkList = $response->json();
        $data['groupId'] =  $groupId ?? '';
        $data['groupName'] =  $groupInformation['group_name'] ?? '';
        $data['allBacklinkList'] =  $allBacklinkList ?? [];
        if (!empty($groupBacklinkList)) {
            foreach ($groupBacklinkList as $row) {
                $assignedBacklinkIds[] = $row['backlink_domain_id'];
            }
        }
        $data['assignedBacklinkIds'] =  $assignedBacklinkIds;
        $data['groupBacklinkList'] =  $groupBacklinkList ?? [];
        return view('pages.group.backlinks.backlink_list', $data);
    }

    public function addAndUpdate(Request $request)
    {
        $data = [];
        $data['group_id'] = $request->group_id;
        if(!empty($request->backlink)) {
            $data['backlink_domain_ids'] = [implode(',', $request->backlink)];
        } else {
            $data['backlink_domain_ids'] =null;
        }
        if ($request->method == 'PUT') {
            $response = Http::put($this->endpoint_url . '/groupAssignedBacklink/updateBacklinkToGroup', $data);
        } else {
            $response = Http::post($this->endpoint_url . '/groupAssignedBacklink/assignBacklinkToGroup', $data);
        }
        $jsonData = $response->json();
        if ($jsonData['status']) {
            return redirect()->intended('groups/backlinks/'.$request->group_id);
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
