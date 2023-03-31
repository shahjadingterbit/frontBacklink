<?php

namespace App\Http\Controllers;

use App\Traits\Authorizable;
use Illuminate\Http\Request;
use App\Services\GoogleAnalyticsService;


class GoogleAnalyticsController extends Controller {
	
	public function __construct (Request $request) {
		   
	}

	public function index() {
		$data = [];
		$data['domainName'] = 'columbustowing.us';
		$data['searchMainTypeID'] = 'kt_analytics_search';
		$data['searchInputID'] = 'analyticsSearch';
		$data['searchPlaceholder'] = 'Google analytics domain';
		return view('pages.googleAnalytics.index',$data);
	}
}
