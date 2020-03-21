<?php

namespace Seek\YuouSDK;

use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    private $rootUrl;
    private $appKey;
    private $appSecret;
    private $time;

    public function __construct(string $appKey, string $appSecret, string $rootUrl)
    {
        $this->rootUrl = $rootUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->time = date('Y-m-d H:i:s', time());
    }

    public function request($method, $uri, $params)
    {
        $http = $this->getHttp();
        $http->addMiddleware($this->headerMiddleware([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'APP-KEY' => $this->appKey,
            'DATE' => $this->time,
            'X-SIGNATURE' => $this->signature($method, $uri, $params),
        ]));
        $url = $this->rootUrl . $uri;

        $response = $http->request($method, $url, $params);

        return json_decode(strval($response->getBody()), true);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param string $params 请求参数JSON
     * @return string
     */
    private function signature(string $method, string $uri, string $params)
    {
        return md5($method . "&" . $this->time . "&" . $uri . "&" . $params . "&" . $this->appKey . "&" . $this->appSecret);
    }
}