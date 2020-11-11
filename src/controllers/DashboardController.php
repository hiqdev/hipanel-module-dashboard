<?php
/**
 * Dashboard Plugin for HiPanel.
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\dashboard\controllers;

use hipanel\base\Controller;
use hipanel\modules\client\models\Client;
use hipanel\modules\dashboard\DashboardInterface;
use hipanel\modules\dashboard\widgets\ObjectsCountWidget;
use hipanel\modules\domain\models\Domain;
use hipanel\modules\finance\models\Plan;
use hipanel\modules\server\models\Server;
use hipanel\modules\stock\models\Model;
use hipanel\modules\stock\models\Part;
use hipanel\modules\ticket\models\Thread;
use Yii;

/**
 * Dashboard controller.
 *
 * Simply empty: does only render index.
 */
class DashboardController extends Controller
{
    public function actionIndex()
    {
        $dashboard = Yii::createObject(DashboardInterface::class);
        $dashboard->setValues($this->getOptions());

        return $this->render('index');
    }

    public function actionGetCount(string $for): string
    {
        if ($this->request->isAjax) {
            $options = $this->getOptions();
            if (Yii::$app->user->can('manage')) {
                if ($for === 'clients') {
                    $options['totalCount']['clients'] = Client::find()->count();
                }
                if ($for === 'domains' && Yii::getAlias('@domain', false)) {
                    $options['totalCount']['domains'] = Domain::find()->where(['states' => 'ok,incoming,outgoing,expired'])->count();
                }
                if ($for === 'servers' && Yii::getAlias('@server', false)) {
                    $options['totalCount']['servers'] = Server::find()->count();
                }
                if ($for === 'tickets' && Yii::getAlias('@ticket', false)) {
                    $options['totalCount']['tickets'] = Thread::find()->count();
                }
                if ($for === 'plans' && Yii::getAlias('@plan', false)) {
                    $options['totalCount']['plans'] = Plan::find()->count();
                }
                if ($for === 'models' && Yii::getAlias('@model', false)) {
                    $options['totalCount']['models'] = Model::find()->count();
                }
                if ($for === 'parts' && Yii::getAlias('@part', false)) {
                    $options['totalCount']['parts'] = Part::find()->count();
                }
            }


            return ObjectsCountWidget::widget([
                'entityName' => $for,
                'totalCount' => $options['totalCount'][$for],
                'ownCount' => $options['model']->count[$for],
            ]);
        }
    }

    private function getOptions(): array
    {
        return Yii::$app->get('cache')->getOrSet([__CLASS__, __METHOD__, Yii::$app->user->identity->id], fn(): array => [
            'model' => Client::findOne([
                'id' => Yii::$app->user->identity->id,
                'with_tickets_count' => true,
                'with_domains_count' => Yii::getAlias('@domain', false) ? true : false,
                'with_servers_count' => true,
                'with_hosting_count' => true,
                'with_contacts_count' => true,
            ]),
            'totalCount' => [],
        ], 180);
    }
}
