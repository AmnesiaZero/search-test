<?php

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Authorization extends Model
{
    protected Client $client;
    function __construct()
    {
        $this->client = new Client();
    }


    /**
     * @throws GuzzleException
     */
    public function authorize(int $organizationId): Client
   {
       $client = new Client();
       $response = $client->get($this->domain."/generate/jwt?organization_id=".$organizationId);
       $responseBody = json_decode($response->getBody());
       return new Client(['headers'=>['Authorization' => 'Bearer '.$responseBody['token']]]);
   }
}