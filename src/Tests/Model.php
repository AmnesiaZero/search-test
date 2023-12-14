<?php

namespace Tests;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Model
{
   protected string $domain = "http://dev.api.search.ipr-smart.ru/api";
   protected string $search = "http://dev.api.search.ipr-smart.ru/api/search";

   protected string $apiMethod;

   protected Client $client;

   protected function __construct(Client $client)
   {
       $this->client = $client;
   }

   public function getResponseBody(ResponseInterface $response):string
   {
       $responseBody = $response->getBody();
       return json_decode($responseBody);
   }
    /**
     * @throws GuzzleException
     */
    public function search(array $params): string
    {
        $url = '';
        if (!empty($params)) {
            $url = sprintf("%s?%s", $this->apiMethod, http_build_query($params, '', '&'));
        };
        $response =  $this->client->get($url);
        tsEcho('Начало запроса - '.$url);
        $response = $this->getResponseBody($response);
        tsEcho('Конец запроса - '.$url);
        return $response;
    }
}