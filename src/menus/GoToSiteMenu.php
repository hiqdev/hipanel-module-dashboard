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

class GoToSiteMenu extends \hiqdev\yii2\menus\Menu
{
    public $url;

    public function items()
    {
        return [
            'return-site' => [
                'label' => Yii::t('hipanel.dashboard', 'Go to site'),
                'url'   => $this->url,
                'icon'  => 'fa-fw fa-home',
            ],
        ];
    }
}
