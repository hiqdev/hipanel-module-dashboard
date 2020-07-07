<?php
/**
 * Dashboard Plugin for HiPanel.
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'components' => [
        'i18n' => [
            'translations' => [
                'hipanel.dashboard' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => dirname(__DIR__) . '/src/messages',
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
            \hipanel\modules\dashboard\menus\DashboardMenu::class => [
                'class' => \hipanel\modules\dashboard\menus\DashboardMenu::class,
            ],
            \hiqdev\thememanager\menus\AbstractSidebarMenu::class => [
                'add' => array_filter([
                    'dashboard' => [
                        'menu' => \hipanel\modules\dashboard\menus\SidebarMenu::class,
                        'where' => [
                            'after' => ['check-domain'],
                            'before' => ['clients', 'finance'],
                        ],
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
        'singletons' => [
            \hipanel\modules\dashboard\DashboardInterface::class => [
                'class' => \hipanel\modules\dashboard\Dashboard::class,
            ],
        ],
    ],
];
