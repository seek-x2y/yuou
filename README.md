# YuouSDK
渝欧SDK

[旧系统Doc](http://doc.xgqqg.com/docs/show/63)

[中台Doc](http://doc.xgqqg.com/docs/show/706)

base on [foundation-sdk](https://github.com/HanSon/foundation-sdk)

## Requirement

- PHP >= 7
- **[composer](https://getcomposer.org/)**

## Installation

```
composer require seek-x2y/yuou-sdk -vvv
```

## Usage

### 

```php
<?php

$yuou = new \Seek\YuouSDK\YuouSDK([
    'appKey' => '',
    'appSecret' => '',
    'rootUrl' => '',
    'isMiddlePlatform' => false, // 是否是中台系统
    'debug' => true, // 调试模式
    'exception_as_array' => true, // 错误返回数组还是异常
    'log' => [
        'name' => 'yuou',
        'file' => __DIR__.'/yuou.log',
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);

// 获取订单
$result = $yuou->request('/api/v2/platform/pullOrder', ['subjectCode' => 'xxx']);
```


## License

MIT
