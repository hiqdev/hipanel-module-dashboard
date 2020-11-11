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

use hipanel\widgets\HookTrait;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ObjectsCountWidget extends Widget
{
    use HookTrait;

    public ?string $entityName = null;

    public ?int $totalCount = null;

    public ?int $ownCount = null;

    public string $fontSize = '18px';

    public function run(): string
    {
        if (!is_null($this->totalCount) || !is_null($this->ownCount)) {
            $html = Yii::$app->user->can('manage') ? $this->renderAsManager() : $this->renderAsClient();
        } else {
            $this->url = Url::to(['/dashboard/dashboard/get-count', 'for' => $this->entityName]);
            $this->registerJsHook('dashboard');
            $html = Html::beginTag('p', ['id' => $this->getId(), 'style' => "margin-bottom: 2em; font-size: {$this->fontSize};"]);
            $html .= Html::tag('span', null, ['class' => 'fa fa-pulse fa-fw fa-spinner']);
            $html .= Html::endTag('p');
        }

        return $html;
    }

    protected function renderAsManager(): string
    {
        $html = Yii::t('hipanel.dashboard', '{count} {total}', [
            'count' => $this->getTotalCount(),
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
