<?php

return [
    'components' => [
        'menuManager' => [
            'menus' => [
                'dashboard' => \hipanel\modules\dashboard\SidebarMenu::class,
            ],
        ],
        'i18n' => [
            'translations' => [
                'hipanel/dashboard' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@hipanel/modules/dashboard/messages',
                    'fileMap' => [
                        'hipanel/dashboard' => 'dashboard.php',
                    ],
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
