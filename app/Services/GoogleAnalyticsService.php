<?php
namespace App\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\ApiCore\ApiException;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Illuminate\Support\Facades\Http;

class GoogleAnalyticsService
{
    public $credentialFileName = null;
    public $propertyId = null;
    public $domainName = null;

    function __construct($domainName)
    {
        $this->domainName = str_replace('http://','', str_replace('https://','', $domainName));
        if(!empty(config('google_analytics')[$this->domainName]['CredentialFileName']) && config('google_analytics')[$this->domainName]['propertyID']) {
            $this->credentialFileName = storage_path()."/app/".config('google_analytics')[$this->domainName]['CredentialFileName'];
            $this->propertyId = config('google_analytics') [$this->domainName]['propertyID'];
            putenv("GOOGLE_APPLICATION_CREDENTIALS=$this->credentialFileName");
        } 
    }
    function DisplayError($err)
    {
        if (count($err) > 0)
        {
            return response()->json(['success' => false, 'errors' => $err, ], 400);
        }
    }
    public function validate_user($order)
    {
        $errors = [];
        if (!empty($order->api_token))
        {
            $token = env('GA4_TOKEN');
            if ($token)
            {
                //success
                
            }
            else
            {
                $errors[] = 'Invalid Api Token!';
            }
        }
        else
        {
            $errors[] = 'Api Token Missing!';
        }
        return $errors;
    }
    public function listActiveUsers()
    {
        $data = [];
        $from = !empty($input['from']) ? $input['from'] : date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));
        $from='2022-09-01';
        $to = !empty($input['to']) ? $input['to'] : 'today';
        $dimension[] = new Dimension(['name' => 'country']);
        $dimension[] = new Dimension(['name' => 'city']);
        if (!empty($input['overTime']))
        {
            $dimension[] = new Dimension(['name' => 'date']);
        }
        try
        {
            ini_set("memory_limit",'512M');
            $client = new BetaAnalyticsDataClient();
            // Make an API call.
            $response = $client->runReport(['property' => 'properties/' . $this->propertyId, 'dateRanges' => [new DateRange(['start_date' => $from, 'end_date' => $to, ]) , ], 'dimensions' => $dimension, 'metrics' => [new Metric(['name' => 'activeUsers']) , ]]);
            $data = json_decode($response->serializeToJsonString() , 1);
            $data = $this->formatedData($data);
        }
        catch(ApiException $e)
        {
            echo 'Message: ' . $e->getMessage();
            $data = json_decode($e->getMessage() , 1);
        }
        return $data;
    }

    public function listEvents()
    {
        $data = [];
        $from = !empty($input['from']) ? $input['from'] : date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));
        $from='2022-09-01';
        $overTime = 'y';
        $to = !empty($input['to']) ? $input['to'] : 'today';
        $dimension[] = new Dimension(['name' => 'eventName']);
        if (!empty($overTime)) { 
            $dimension[] = new Dimension(['name' => 'date']); 
        }
        try
        {
            $client = new BetaAnalyticsDataClient();
            // Make an API call.
            $response = $client->runReport(['property' => 'properties/' . $this->propertyId, 'dateRanges' => [new DateRange(['start_date' => $from, 'end_date' => $to, ]) , ], 'dimensions' => $dimension, 'metrics' => [new Metric(['name' => 'eventCount']) , ]]);
            $data = json_decode($response->serializeToJsonString() , 1);
            $data = $this->formatedData($data);
        }
        catch(ApiException $e)
        {
            echo 'Message: ' . $e->getMessage();
            $data = json_decode($e->getMessage() , 1);
        }
        return $data;
    }

    public function listScreenPageViews()
    {
        $data = [];
        $from = !empty($input['from']) ? $input['from'] : date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));
        $from='2022-09-01';
        $overTime = 'y';
        $to = !empty($input['to']) ? $input['to'] : 'today';
        $dimension[] = new Dimension(['name' => 'fullPageUrl']);
        $dimension[] = new Dimension(['name' => 'pageTitle']);
        if (!empty($overTime))
        {
            $dimension[] = new Dimension(['name' => 'date']);
        }
        try
        {
            $client = new BetaAnalyticsDataClient();
            $response = $client->runReport(['property' => 'properties/' . $this->propertyId, 'dateRanges' => [new DateRange(['start_date' => $from, 'end_date' => $to, ]) , ], 'dimensions' => $dimension, 'metrics' => [new Metric(['name' => 'screenPageViews']) , ]]);
            $data = json_decode($response->serializeToJsonString() , 1);
            $data = $this->formatedData($data);
        }
        catch(ApiException $e)
        {
            echo 'Message: ' . $e->getMessage();
            $data = json_decode($e->getMessage() , 1);
        }
        return $data;
    }

    function formatedData($data)
    {
        $headers = array();
        $hdata = array();
        foreach ($data as $d => $dval)
        {
            if ($d == "dimensionHeaders" || $d == "metricHeaders")
            {
                foreach ($dval as $dh) $headers[] = $dh["name"];
            }
            if ($d == "rows")
            {
                foreach ($dval as $r => $rows)
                {
                    foreach ($rows["dimensionValues"] as $hk => $dv) $hdata[$r][] = $dv["value"]; //$headers[$hk]
                    foreach ($rows["metricValues"] as $hk => $dv) $hdata[$r][] = $dv["value"];
                }
            }
        }
        return [$headers, $hdata];
    }
}

