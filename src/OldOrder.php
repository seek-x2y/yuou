<?php


namespace Seek\YuouSDK;

/**
 * 渝欧老系统
 * http://doc.xgqqg.com/docs/show/63
 * Class OldOrder
 * @package Seek\YuouSDK
 */
class OldOrder extends Api
{

    public function queryOrders(string $subjectCode, string $whCode, int $number=10)
    {
        $params = [
            'subjectCode' => $subjectCode,
            'whCode' => $whCode,
            'number' => $number
        ];
        return $this->request('POST', '/api/v2/platform/pullOrder', $params);
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