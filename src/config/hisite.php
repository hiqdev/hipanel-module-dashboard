<?php

return [
    'components' => [
        'i18n' => [
            'translations' => [
                'hipanel:dashboard' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@hipanel/modules/dashboard/messages',
                ],
            ],
        ],
    ],
    'modules' => [
        'dashboard' => [
            'class' => \hipanel\modules\dashboard\Module::class,
        ],
    ],
    'container' => [
        'definitions' => [
            \hiqdev\thememanager\menus\AbstractSidebarMenu::class => [
                'add' => array_filter([
                    'dashboard' => [
                        'menu' => \hipanel\modules\dashboard\menus\SidebarMenu::class,
                        'where' => 'first',
                    ],
                    'return-site' => empty($params['hipanel.siteUrl']) ? null : [
                        'menu' => [
                            'class' => \hipanel\modules\dashboard\menus\GoToSiteMenu::class,
                            'url'   => $params['hipanel.siteUrl'],
                        ],
                        'where' => 'last',
                    ],
                ]),
            ],
        ],
    ],
];
