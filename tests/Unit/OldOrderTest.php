<?php


namespace Seek\YuouSDK\Tests\Unit;

use Seek\YuouSDK\Tests\TestCase;
use Seek\YuouSDK\YuouSDK;

class OldOrderTest extends TestCase
{
    protected $app;

    public function setUp(): void
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
                'level' => 'debug',
                'permission' => 0777,
            ]
        ];
        $this->app = new YuouSDK($config);
    }


    public function testQueryOrders()
    {
        $result = $this->app->order->queryOrders('10018', 'SYW0027');
        //var_dump($result);
        $this->assertOk($result);
    }

    public function testConfirmOrder()
    {
        $result = $this->app->order->confirmOrder([
            ['orderNo' => 'D2000102148737668_85886'],
            ['orderNo' => 'D2000102136484289_85896']
        ]);
        //var_dump($result);
        $this->assertOk($result);
    }


    public function testLogistics()
    {
        $params = [
            [
                "orderNo" => "20180815CTH33653",
                "thirdPartyGoodsCode" => "featurestest1",
                "logisticsCompany" => "3",
                "waybill" => "123"
            ], [
                "orderNo" => "20180815CTH33653",
                "thirdPartyGoodsCode" => "featurestest2",
                "logisticsCompany" => "3",
                "waybill" => "456"
            ]
        ];

        $result = $this->app->order->logistics($params);
        //var_dump($result);
        $this->assertOk($result);
    }

    public function testLackPayBill()
    {
        $params = [
            ['orderNo' => 'D2000102148737668_85886'],
            ['orderNo' => 'D2000102136484289_85896']
        ];
        $result = $this->app->order->logistics($params);
        var_dump($result);
        $this->assertOk($result);
    }
}