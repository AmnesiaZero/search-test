<?php

namespace Tests;

use GuzzleHttp\Client;

class Audios extends Model
{
    function __construct(Client $client)
    {
        parent::__construct($client);
        $this->apiMethod = $this->search.'/audios';
    }

}