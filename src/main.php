<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Tests\Audios;
use Tests\Authorization;
use Tests\Books;

$organizationId = 170;
$auth = new Authorization();
try {
    $client = $auth->authorize($organizationId);
    $book = new Books($client);
    $response = $book->search(['available' => 0,'search' => 'Политика']);
    tsEcho('Запрос к books с available=0,search=Политика - '.$response);
    $audios = new Audios($client);
    $response = $audios->search(['search' => 'Смерть']);
    tsEcho('Запрос к audios с search = Смерть'.$response);

} catch (GuzzleException $e) {
    echo $e->getMessage();
}

function tsEcho($message): void
{
    $timestamp = date("Y-m-d H:i:s");
    echo "[$timestamp] $message\n";
}

