<?php
/**
 * @link    http://hiqdev.com/hipanel-module-dashboard
 * @license http://hiqdev.com/hipanel-module-dashboard/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hipanel\modules\dashboard;

class Plugin extends \hiqdev\pluginmanager\Plugin
{
    protected $_items = [
        'menus' => [
            [
                'class' => 'hipanel\modules\dashboard\SidebarMenu',
            ],
        ],
        'modules' => [
            'dashboard' => [
                'class' => 'hipanel\modules\dashboard\Module',
            ],
        ],
    ];

}
