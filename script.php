<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    "base_uri" => "https://validator.prestashop.com"
]);

echo $argv[1];
echo $argv[2];

try {
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
                'contents' => getenv('VALIDATOR_API_KEY')
            ]
        ]
    ]);
     
    $body = $response->getBody()->getContents();
    $arr_body = json_decode($body);
    var_dump($arr_body);
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}
  