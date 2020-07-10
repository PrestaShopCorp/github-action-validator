<?php

require_once '~/.composer/vendor/autoload.php';


$client = new \GuzzleHttp\Client([
    "base_uri" => "https://validator.prestashop.com"
]);

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
            'contents' => $argv[3]
        ]
    ]
]);
 
$body = $response->getContents()->getBody();
$arr_body = json_decode($body);
print_r($arr_body);
  