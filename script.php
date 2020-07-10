<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    "base_uri" => "https://validator.prestashop.com"
]);
echo "je passe ici";
echo getenv('API_KEY');

$response = $client->post('/api/modules', [
    'multipart' => [
        [
            'name'     => 'github_link',
            'contents' => $argv[1],
        ],
        [
            'name'     => 'github_branch',
            'contents' => $argv[2],
        ],
        [
            'name'     => 'key',
            'contents' => getenv('API_KEY')
        ]
    ]
]);
 
$body = $response->getBody()->getContents();
$arr_body = json_decode($body);
print_r($arr_body);
  