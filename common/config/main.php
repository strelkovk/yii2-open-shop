<?php
return [
    'language' => 'ru',
    'bootstrap' => [],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=dtrank',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',
                'username' => 'username',
                'password' => 'password',
                'port' => '465',
                'encryption' => 'tls',
            ],
        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['ru'],
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'enableDefaultLanguageUrlCode' => false,
            'enableLanguagePersistence' => false,
            'enableLanguageDetection' => false,
        ],
        'i18n' => [
            'class' => Zelenin\yii\modules\I18n\components\I18N::className(),
            'languages' => ['ru'],
            'translations' => [
                'yii' => [
                    'class' => yii\i18n\DbMessageSource::className()
                ]
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
//        'sideTree' => [
//            'class' => 'app\components\SideTree',
//        ],
    ],
];
