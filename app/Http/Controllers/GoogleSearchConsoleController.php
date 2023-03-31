<?php

namespace App\Http\Controllers;

use App\Traits\Authorizable;
use Illuminate\Http\Request;
use App\Services\GoogleAnalyticsService;


class GoogleSearchConsoleController extends Controller {
	
	public function __construct (Request $request) {
		   
	}
	public function index() {
		$data = [];
		$data['domainName'] = 'columbustowing.us';
		$data['searchMainTypeID'] = 'kt_console_search';
		$data['searchInputID'] = 'consoleSearch';
		$data['searchPlaceholder'] = 'Console search domain';
		return view('pages.googleConsole.index',$data);
	}
}
