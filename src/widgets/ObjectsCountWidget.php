<?php

namespace hipanel\modules\dashboard\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ObjectsCountWidget extends Widget
{
    public $ownCount;

    public $totalCount;

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
        echo Html::beginTag('span', ['style' => 'font-size:130%']);
        echo Yii::t('hipanel/dashboard', '{count} {total}', [
            'count' => $this->totalCount,
            'total' => '<small>' . Yii::t('hipanel/dashboard', '{0, plural, other{total}}', $this->totalCount) . '</small>',
        ]);
        echo Html::tag('small', ' / ' . Yii::t('hipanel/dashboard', '{0, plural, other{# own}}', $this->ownCount));
        echo Html::endTag('span');
    }

    protected function renderAsClient()
    {
        echo Html::tag('span', $this->ownCount, ['style' => 'font-size:130%']);
    }
}
