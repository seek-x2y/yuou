<?php


namespace Seek\YuouSDK\Order;

use Pimple\Container;
use Seek\YuouSDK\Api;
use Seek\YuouSDK\YuouException;

/**
 * 渝欧老系统
 * http://doc.xgqqg.com/docs/show/63
 * Class OldOrder
 * @package Seek\YuouSDK
 */
class OldOrder extends Api
{

    public function queryOrders(int $number=10)
    {
        $container = new Container();
        $config = $container->getConfig();
        if(isset($config['subjectCode']) && isset($config['whCode'])){
            $params = [
                'subjectCode' => $config['subjectCode'],
                'whCode' => $config['whCode'],
                'number' => $number
            ];
            return $this->request('POST', '/api/v2/platform/pullOrder', $params);
        }else{
            throw new YuouException('渝欧老系统订单拉取接口必需 主体编码（sujectCode）和仓库编码（whCode）字段');
        }
    }


    /**
     * 订单确认
     * @param array $orderNos [{orderNo:123},{orderNo:456}]
     * @return mixed
     */
    public function confirmOrder(array $orderNos)
    {
        return $this->request('POST', '/api/v2/platform/confirmOrder', $orderNos);
    }

    public function logistics(array $infos)
    {
        return $this->request('POST', '/api/v2/platform/logistics', $infos);
    }

    public function lackPayBill(string $orderNo)
    {
        return $this->request('POST', '/api/v2/platform/lackPayBill', ['orderNo' => $orderNo]);
    }
}