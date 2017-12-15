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
use yii\widgets\Menu;

class DashboardMenu extends \hiqdev\yii2\menus\Menu
{
    public $widgetConfig = [
        'class' => Menu::class,
        'itemOptions' => [
            'tag' => false,
        ],
        'options' => [
            'tag' => false,
        ],
    ];

    public function items()
    {
        return [];
    }
}
