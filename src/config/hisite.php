<?php

return [
    'components' => [
        'menuManager' => [
            'menus' => [
                'dashboard' => hipanel\modules\dashboard\SidebarMenu::class,
            ],
        ],
    ],
    'modules' => [
        'dashboard' => [
            'class' => hipanel\modules\dashboard\Module::class,
        ],
    ],
];
