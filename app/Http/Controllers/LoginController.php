<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function userlogin(Request $request)
    {
        $data = [];
        $data['username'] = $request->email;
        $data['password'] = $request->password;
        $response = Http::post($this->endpoint_url . '/auth',$data);
        $userList = $response->json();
        if($response->status() == 200) {
            \Session::put('accessToken', $userList['accessToken']);
        }
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Session::get('accessToken')) {
            return redirect('/');
        }
        return view('auth.login');
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        if (Session::get('accessToken')) {
            Session::forget('accessToken');
        }
        if (!Session::get('accessToken')) {
            return redirect('login');
        }
    }
}
