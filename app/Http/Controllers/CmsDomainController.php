<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class CmsDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $endpoint_url = "http://localhost:3001/api";
    public function index()
    {
        $response = Http::get($this->endpoint_url . '/domains');
        $domainList = $response->json();
        return view('pages.domain.index', ['domainList' => $domainList]);
    }
}
