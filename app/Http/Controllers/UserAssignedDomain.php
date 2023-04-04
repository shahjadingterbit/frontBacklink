<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserAssignedDomain extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index($userId)
    {
        $data = [];
        $userDetail = Http::get($this->endpoint_url . '/users/' . $userId);
        $userInformation = $userDetail->json();

        $response = Http::get($this->endpoint_url . '/domainAssignedToUser/' . $userId);
        $userDomainList = $response->json();
        $data['userId'] =  $userId ?? '';
        $data['userName'] =  $userInformation['name'] ?? '';
        if ($response->status() == 200) {
            $data['userDomainList'] =  $userDomainList;
        } else {
            $data['userDomainList'] =  [];
        }
        return view('pages.user.domain.index', $data);
    }

    public function assign($userId)
    {
        $assignedDomainIds = [];
        $data = [];
        $userDetail = Http::get($this->endpoint_url . '/users/' . $userId);
        $userInformation = $userDetail->json();
        $response = Http::get($this->endpoint_url . '/domainAssignedToUser/' . $userId);
        $userDomainList = $response->json();
        $data['userId'] =  $userId ?? '';
        $data['userName'] =  $userInformation['name'] ?? '';
        $allDomain = Http::get($this->endpoint_url . '/domainAssignedGroup/domainListHasGroup');
        $allDomainList = $allDomain->json();
        if ($allDomain->status() == 200) {
            $data['allDomainList'] =  $allDomainList;
        } else {
            $data['allDomainList'] = [];
        }
        if ($response->status() == 200 && !empty($userDomainList)) {
            foreach ($userDomainList as $row) {
                $assignedDomainIds[] = $row['domain_id'];
            }
        }
        $data['assignedDomainIds'] =  $assignedDomainIds;
        $data['userDomainList'] =  $userDomainList ?? [];
        return view('pages.user.domain.domain_list', $data);
    }

    public function addAndUpdateDomain(Request $request)
    {
        $data = [];
        $data['user_id'] = $request->user_id;
        if (!empty($request->domain)) {
            $data['domain_ids'] = $request->domain;
        } else {
            $data['domain_ids'] = array();
        }
        if ($request->method == 'PUT') {
            $response = Http::put($this->endpoint_url . '/domainAssignedToUser/updateDomainToUser', $data);
        } else {
            $response = Http::post($this->endpoint_url . '/domainAssignedToUser/addDomainToUser', $data);
        }
        $jsonData = $response->json();

        if ($response->status() == 200) {
            return redirect()->intended('users/domains/' . $request->user_id);
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
