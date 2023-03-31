<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index()
    {
        $response = Http::get($this->endpoint_url . '/groups');
        $groupList = $response->json();
        return view('pages.group.index', ['groupList' => $groupList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $response = Http::delete($this->endpoint_url . '/groups/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('groups');
        }
    }
    public function create()
    {
        return view('pages.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['group_name'] = $request->name;
        $response = Http::post($this->endpoint_url . '/groups/addGroup', $data);
        $jsonData = $response->json();
        if ($jsonData['status']) {
            return redirect()->intended('groups');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->endpoint_url . '/groups/' . $id);
        $groupData = $response->json();
        return view('pages.group.edit_group', compact('groupData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['id'] = $request->group_id;
        $data['group_name'] = $request->name;
        $response = Http::put($this->endpoint_url . '/groups/updateGroup', $data);
        $jsonData = $response->json();
        if ($jsonData['status']) {
            return redirect()->route('groups.index')->with('success', 'Group has been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->endpoint_url . '/group/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('groups');
        }
    }
}
