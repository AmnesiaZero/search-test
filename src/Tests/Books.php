<?php

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Books extends Model
{
    function __construct(Client $client)
    {
        parent::__construct($client);
        $this->apiMethod = $this->search.'/books';
    }

}