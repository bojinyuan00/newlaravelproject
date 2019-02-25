<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => 'pn7vab025.bkt.clouddn.com', //你的七牛域名
                'https'     => '',         //你的HTTPS域名
                'custom'    => '',//Useless 没啥用，请直接使用上面的 default 项
             ],
            'access_key'=> 'xLuFtQHEgHw-N96ymNioOvtXwSvvKDsmplhrwAp4',  //AccessKey
            'secret_key'=> 'CGte_bHTE0cvxFpJoAwap0vvgnQIyNRJPvA1-aDk',  //SecretKey
            'bucket'    => 'projectone',  //Bucket名字
            'notify_url'=> '',  //持久化处理回调地址
            'access'    => 'public'  //空间访问控制 public 或 private
            // 'hotlink_prevention_key' => null, // CDN 时间戳防盗链的 key。 设置为 null 则不启用本功能。
            // 'hotlink_prevention_key' => 'cbab68a279xxxxxxxxxxab509a', // 同上，备用
        ],

    ],

];
