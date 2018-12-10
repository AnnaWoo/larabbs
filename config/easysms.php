<?php
return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'yuntongxun',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'yunpian' => [
            'api_key' => env('YUNPIAN_API_KEY'),
        ],
        'yuntongxun' => [
            'app_id' => '8aaf070866235bc501667ffe1be634c6',
            'account_sid' => '8aaf07085b3bb22e015b476db2ed084c',
            'account_token' => '1d1256dfcad6455ab71de32104f155c4',
            'is_sub_account' => false,
        ]
    ],
];

