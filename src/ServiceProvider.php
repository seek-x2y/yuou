<?php


namespace Seek\YuouSDK;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['api'] = function ($container) {
            $config = $container->getConfig();
            return new Api($config['appKey'], $config['appSecret'], $config['rootUrl']);
        };

        $container['order'] = function ($container) {
            $config = $container->getConfig();
            if (isset($config['isMiddlePlatform']) && $config['isMiddlePlatform']) {
                return new Order($config['appKey'], $config['appSecret'], $config['rootUrl']);
            } else {
                return new OldOrder($config['appKey'], $config['appSecret'], $config['rootUrl']);
            }
        };
    }
}