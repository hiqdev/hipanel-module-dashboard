<?php
/**
 * @link    http://hiqdev.com/hipanel-module-dashboard
 * @license http://hiqdev.com/hipanel-module-dashboard/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hipanel\modules\dashboard;

class SidebarMenu extends \hipanel\base\Menu
{

    protected $_addTo = 'sidebar';

    protected $_where = [
        'after'     => ['header'],
        'before'    => ['clients', 'finance', 'tickets', 'domains', 'servers', 'hosting'],
    ];

    protected $_items = [
        'dashboard' => [
            'label'     => 'Dashboard',
            'url'       => ['/dashboard/dashboard'],
            'icon'      => 'fa-dashboard',
        ],
    ];

}
