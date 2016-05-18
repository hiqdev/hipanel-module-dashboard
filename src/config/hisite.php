<?php

return [
    'menus' => [
        hipanel\modules\dashboard\SidebarMenu::class,
    ],
    'modules' => [
        'dashboard' => [
            'class' => hipanel\modules\dashboard\Module::class,
        ],
    ],
];
