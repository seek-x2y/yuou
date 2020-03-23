<?php


namespace Seek\YuouSDK\Tests;


class TestCase extends \PHPUnit\Framework\TestCase
{

    public function assertOk(array $result)
    {
        if (empty($result['error_response'])) {
            if(isset($result['success']) && $result['success']){
                $this->assertTrue(true);
            }else{
                var_dump($result);
            }
        } else {
            var_dump($result);
            $this->assertTrue(false, $result['error_response']['sub_msg'] ?? $result['error_response']['msg']);
        }
    }
}