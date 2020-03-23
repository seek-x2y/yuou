<?php


namespace Seek\YuouSDK\Tests\Unit;

use Seek\YuouSDK\Tests\TestCase;
use Seek\YuouSDK\YuouSDK;

class OldYuouSDKTest extends TestCase
{
    protected $app;

    public function setUp():void
    {
        $config = [
            'appKey' => 'test',
            'appSecret' => 'dfeb3a87bf69a0a0b162660476c6cbc0254f1038',
            'rootUrl' => 'http://39.104.188.230:9091',
            'isMiddlePlatform' => false, // 是否是中台系统
            'debug' => true, // 调试模式
            'exception_as_array' => true, // 错误返回数组还是异常
            'log' => [
                'name' => 'yuou',
                'file' => __DIR__ . '/yuou.log',
                'level'      => 'debug',
                'permission' => 0777,
            ]
        ];
        $this->app = new YuouSDK($config);
    }


    public function testQueryOrders()
    {
        $result = $this->app->order->queryOrders('1008', 'SYW0027');
        $this->assertOk($result);
    }
}