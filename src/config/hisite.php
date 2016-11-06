<?php

return [
    'components' => [
        'menuManager' => [
            'items' => [
                'sidebar' => [
                    'add' => [
                        'dashboard' => [
                            'menu' => \hipanel\modules\dashboard\menus\SidebarMenu::class,
                            'where' => 'first',
                        ],
                    ],
                ],
            ],
        ],
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
];
