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

use hipanel\actions\IndexAction;
use hipanel\actions\TotalCountCache;
use hipanel\modules\domain\models\Domain;
use hipanel\widgets\HookTrait;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ObjectsCountWidget extends Widget
{
    use HookTrait;

    public ?string $entityName = null;

    public ?int $totalCount = null;

    public ?int $ownCount = null;

    public ?string $route = null;

    public string $fontSize = '18px';

    public function run(): string
    {
        $isManager = Yii::$app->user->can('manage');
        $fetchTotalCount = $isManager && is_null($this->totalCount) && !empty($this->route);
        if ($fetchTotalCount) {
            $this->totalCount = TotalCountCache::get($this->route);
            $fetchTotalCount = is_null($this->totalCount);
        }

        $html = Html::beginTag('p', ['style' => "margin-bottom: 2em; font-size: {$this->fontSize};"]);
        $html .= $isManager ? $this->renderAsManager() : $this->renderAsClient();
        if ($fetchTotalCount) {
            $this->url = $this->route;
            $this->registerJsHook(IndexAction::VARIANT_TOTAL_COUNT_RESPONSE);
        }
        $html .= Html::endTag('p');

        return $html;
    }

    protected function renderAsManager(): string
    {
        $count = $this->totalCount ?? Html::tag('span', null, ['class' => 'fa fa-pulse fa-fw fa-spinner']);
        $html = Yii::t('hipanel.dashboard', '{count} {total}', [
            'count' => Html::tag('span', $count, ['id' => $this->getId()]),
            'total' => Yii::t('hipanel.dashboard', '{0, plural, other{total}}', $this->getTotalCount()),
        ]);
        if ($this->getOwnCount() > 0) {
            $html .= ' / ' . Yii::t('hipanel.dashboard', '{0, plural, other{# own}}', $this->getOwnCount());
        }

        return $html;
    }

    protected function renderAsClient(): string
    {
        return Html::tag('span', $this->getOwnCount(), ['style' => "font-size: {$this->fontSize}"]);
    }

    public function getOwnCount(): int
    {
        return $this->ownCount ?? 0;
    }

    public function getTotalCount(): int
    {
        return $this->totalCount ?? 0;
    }
}
