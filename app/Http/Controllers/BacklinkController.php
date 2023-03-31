<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BacklinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index()
    {
        $response = Http::get($this->endpoint_url . '/backlinks');
        $backlinkList = $response->json();
        return view('pages.backlink.index', ['backlinkList' => $backlinkList]);
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
    public function create()
    {
        return view('pages.backlink.create');
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
