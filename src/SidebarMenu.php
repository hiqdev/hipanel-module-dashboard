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

use Yii;

class SidebarMenu extends \hipanel\base\Menu
{
    protected $_addTo = 'sidebar';

    protected $_where = 'first';

    public function items()
    {
        return [
            'dashboard' => [
                'label' => Yii::t('app', 'Dashboard'),
                'url'   => ['/dashboard/dashboard'],
                'icon'  => 'fa-dashboard',
            ],
        ];
    }
}
