<?php


namespace Seek\YuouSDK;


use Hanson\Foundation\Foundation;

class YuouSDK extends Foundation
{
    protected $providers = [
        ServiceProvider::class
    ];

    public function __construct(array $config)
    {
        parent::__construct($config);
    }
}