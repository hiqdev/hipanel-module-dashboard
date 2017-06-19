<?php
/**
 * Dashboard Plugin for HiPanel.
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\dashboard\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ObjectsCountWidget extends Widget
{
    public $ownCount;

    public $totalCount;

    public $fontSize = '18px';

    public function run()
    {
        if (Yii::$app->user->can('manage')) {
            $this->renderAsManager();
        } else {
            $this->renderAsClient();
        }
    }

    protected function renderAsManager()
    {
        echo Html::beginTag('span', ['style' => "font-size: {$this->fontSize}"]);
        echo Yii::t('hipanel.dashboard', '{count} {total}', [
            'count' => $this->totalCount,
            'total' => '<small>' . Yii::t('hipanel.dashboard', '{0, plural, other{total}}', $this->totalCount) . '</small>',
        ]);
        echo Html::tag('small', ' / ' . Yii::t('hipanel.dashboard', '{0, plural, other{# own}}', $this->ownCount));
        echo Html::endTag('span');
    }

    protected function renderAsClient()
    {
        echo Html::tag('span', $this->ownCount, ['style' => "font-size: {$this->fontSize}"]);
    }
}
