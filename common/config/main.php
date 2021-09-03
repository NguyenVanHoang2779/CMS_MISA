<?php
require_once __DIR__.'/../../common/helpers.php';

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
         'gridview' =>  [
    'class' => '\kartik\grid\Module',
],
    ],
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=103.143.206.63;dbname=db_hoang',
            'username' => 'ukakoak',
            'password' => 'Kakoak@123',
            'charset' => 'utf8',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'formatter' => [
            'class' => \common\i18n\Formatter::class,
            'datetimeFormat' => 'php:d/m/Y H:i',
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'currencyCode' => '€',
            'nullDisplay' => '-',
        ],

    ],
];
