<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index()
    {
        $response = Http::get($this->endpoint_url . '/roles');
        $roleList = $response->json();
        return view('pages.role.index', ['roleList' => $roleList]);
    }

    public function create()
    {
        return view('pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['roleName'] = $request->name;
        $data['level'] = $request->level;
        $response = Http::post($this->endpoint_url . '/roles/addRole', $data);
        $response->json();
        if ($response->status() == 200) {
            return redirect()->intended('roles');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $response = Http::get($this->endpoint_url . '/roles/'.$id);
        $roleData = $response->json();
        $data['roleData'] = $roleData;
        return view('pages.role.edit_role', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['id'] = $request->role_id;
        $data['roleName'] = $request->name;
        $data['level'] = $request->level;

        $response = Http::put($this->endpoint_url . '/roles/updateRole', $data);
        $response->json();
        if ($response->status() == 200) {
            return redirect()->intended('roles');
        }
    }
}
