<?php


namespace Seek\YuouSDK\Tests\Unit;

use Seek\YuouSDK\Tests\TestCase;
use Seek\YuouSDK\YuouSDK;

class YuouSDKTest extends TestCase
{
    protected $app;

    public function setUp():void
    {
        $config = [
            'appKey' => 'S00000',
            'appSecret' => 'secret=77109b81-ddc7-11e9-9d60-0242ac110002',
            'rootUrl' => 'http://39.104.188.230:1800',
            'isMiddlePlatform' => true, // 是否是中台系统
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
        $result = $this->app->order->queryOrders();
        $this->assertOk($result);
    }
}