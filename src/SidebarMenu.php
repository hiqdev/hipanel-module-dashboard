<?php

/*
 * Dashboard Plugin for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2015, HiQDev (https://hiqdev.com/)
 */

namespace hipanel\modules\dashboard;

class SidebarMenu extends \hipanel\base\Menu
{
    protected $_addTo = 'sidebar';

    protected $_where = [
        'after'  => ['header'],
        'before' => ['clients', 'finance', 'tickets', 'domains', 'servers', 'hosting'],
    ];

    protected $_items = [
        'dashboard' => [
            'label' => 'Dashboard',
            'url'   => ['/dashboard/dashboard'],
            'icon'  => 'fa-dashboard',
        ],
    ];
}
