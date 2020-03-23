<?php

namespace Seek\YuouSDK;


/**
 * 渝欧中台系统
 * http://doc.xgqqg.com/docs/show/381
 * Class Order
 * @package Seek\YuouSDK\Order
 */
class Order extends Api
{
    public function queryOrders(string $isHang = 'false', string $customs = '', int $pageSize = 50)
    {
        $params = [
            'isHang' => $isHang,
            'customs' => $customs,
            'pageSize' => $pageSize,
        ];
        return $this->request('GET', '/api/v1/order/pull', $params);
    }

    /**
     * @param array $orderNos 订单编号集合
     * @return mixed
     */
    public function receipt(array $orderNos)
    {
        return $this->request('POST', '/api/v1/order/receipt', $orderNos);
    }

    /**
     * 回传物流单号
     * @param array $arr
     * [
     * {
     * "orderNum": "101201909191192655",
     * "storeGoodsNo": "23123",
     * "specNum": 1,
     * "quantity": 6,
     * "logisticsCompany": "5",
     * "waybill": "123123123"
     * }
     * ]
     * @return mixed
     */
    public function logistics(array $arr)
    {
        return $this->request('POST', '/api/v1/order/importLogistics', $arr);
    }


    /**
     * 标记异常订单
     * @param string $orderNum 平台订单号
     * @param string $exceptionType2 异常类型
     * @param string|null $exceptionAttachment 凭证附件
     * @return mixed
     */
    public function signException(string $orderNum, string $exceptionType2, string $exceptionAttachment = null)
    {
        $params = [
            'orderNum' => $orderNum,
            'exceptionType2' => $exceptionType2,
            'exceptionAttachment' => $exceptionAttachment
        ];
        return $this->request('POST', '/api/v1/order/importLogistics', $params);
    }
}