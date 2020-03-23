<?php


namespace Seek\YuouSDK;

/**
 * 渝欧老系统
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


    public function confirmOrder(string $orderNo)
    {
        return $this->request('POST', '/api/v2/platform/confirmOrder', ['orderNo' => $orderNo]);
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