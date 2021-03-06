<?php
/**
 * Dashboard Plugin for HiPanel.
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\dashboard\menus;

use Yii;

class SidebarMenu extends \hiqdev\yii2\menus\Menu
{
    public function items()
    {
        return [
            'dashboard' => [
                'label' => Yii::t('hipanel', 'Dashboard'),
                'url'   => ['/dashboard/dashboard'],
                'icon'  => 'fa-dashboard',
            ],
        ];
    }
}
