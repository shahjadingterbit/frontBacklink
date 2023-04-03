<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index()
    {
        $response = Http::get($this->endpoint_url . '/users');
        $userList = $response->json();
        return view('pages.user.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $response = Http::delete($this->endpoint_url . '/users/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('users');
        }
    }
    public function create()
    {
        $data = [];
        $response = Http::get($this->endpoint_url . '/roles/');
        $roleList = $response->json();
        $data['roleList'] = $roleList;
        return view('pages.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['role_id'] = $request->role;
        $response = Http::post($this->endpoint_url . '/users/addUser', $data);
        $response->json();
        if ($response->status() == 200) {
            return redirect()->intended('users');
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
        $response = Http::get($this->endpoint_url . '/users/' . $id);
        $userData = $response->json();
        $response = Http::get($this->endpoint_url . '/roles/');
        $roleList = $response->json();
        $data['userData'] = $userData;
        $data['roleList'] = $roleList;
        return view('pages.user.edit_user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data['id'] = $request->user_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        // if(!empty($request->password)) {
        //     $data['password'] = $request->password;
        // }
        $data['role_id'] = $request->role;
        $response = Http::put($this->endpoint_url . '/users/updateUser', $data);
        $response->json();
        if ($response->status() == 200) {
            return redirect()->intended('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->endpoint_url . '/users/' . $id);
        $groupData = $response->json();
        if ($groupData['status']) {
            return redirect()->intended('users');
        }
    }
}
