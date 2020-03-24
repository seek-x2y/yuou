<?php

namespace Seek\YuouSDK;

use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    private $rootUrl;
    private $appKey;
    private $appSecret;
    private $time;

    public function __construct(string $appKey, string $appSecret, string $rootUrl, array $otherParams=[])
    {
        $this->rootUrl = $rootUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->time = date('Y-m-d H:i:s', time());
    }

    public function request(string $method, string $uri, array $params)
    {
        $http = $this->getHttp();
        $params = json_encode($params);
        $http->addMiddleware($this->headerMiddleware([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'APP-KEY' => $this->appKey,
            'DATE' => $this->time,
            'X-SIGNATURE' => $this->signature($method, $uri, $params),
        ]));
        $url = $this->rootUrl . $uri;
        $response = call_user_func_array([$http, $method], [$url, ['data' => $params]]);

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
        //var_dump($method . "&" . $this->time . "&" . $uri . "&" . $params . "&" . $this->appKey . "&" . $this->appSecret);
        return md5($method . "&" . $this->time . "&" . $uri . "&" . $params . "&" . $this->appKey . "&" . $this->appSecret);
    }
}