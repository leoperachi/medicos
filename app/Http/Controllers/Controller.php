<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $client;

    public function __construct()
    {

    }

    public function setClient(){
        if(!isset($client)){
            $this->client = new Client([
                // Base URI is used with relative requests
                 'base_uri' => 'localhost:8001/api/',
            ]);
        }
    }
}
