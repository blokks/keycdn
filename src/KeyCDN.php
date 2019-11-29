<?php

namespace Blokks\Services;

use Blokks\Services\Traits\ZonesTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class KeyCDN
{
    use ZonesTrait;

    private $apiKey;
    private $url;


    public function __construct($apiKey, $url)
    {
        $this->apiKey = $apiKey;
        $this->url = $url;
    }


    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }


    public function setBaseUrl($url)
    {
        $this->url = $url;
        return $this;
    }


    public function get(string $endpoint, array $query = [])
    {
        return $this->request('GET', $endpoint, [
            'query' => $query,
        ]);
    }


    public function post(string $endpoint, array $body = [])
    {
        return $this->request('POST', $endpoint, [
            'body' => $body,
        ]);
    }


    public function delete(string $endpoint, array $body = [])
    {
        return $this->request('DELETE', $endpoint, [
            'json' => $body,
        ]);
    }


    public function request(string $method, string $endpoint, array $options = [])
    {
        $client = new Client([
            'auth' => [$this->apiKey, ''],
            'base_uri' => $this->url,
            'headers' => [
                'Content-Type: application/json',
            ],
        ]);

        try {
            $request = $client->request($method, $endpoint, $options);
        } catch (ClientException $exception) {
            dd($exception->getCode(), $exception->getMessage());
        }

        $result = (string)$request->getBody();
        $result = json_decode($result);

        return $result;
    }
}
