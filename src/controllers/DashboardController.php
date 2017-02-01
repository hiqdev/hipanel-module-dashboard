<?php

/*
 * Dashboard Plugin for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\dashboard\controllers;

use hipanel\modules\client\controllers\ClientController;
use hipanel\modules\client\models\Contact;
use hipanel\modules\domain\models\Domain;
use hipanel\modules\server\models\Server;
use hipanel\modules\ticket\models\Thread;
use Yii;

/**
 * Dashboard controller.
 *
 * Simply empty: does only render index.
 */
class DashboardController extends \hipanel\base\Controller
{
    public function actionIndex()
    {
        $options = [
            'model' => ClientController::findModel([
                'id'                  => Yii::$app->user->identity->id,
                'with_tickets_count'  => true,
                'with_domains_count'  => Yii::getAlias('@domain', false) ? true : false,
                'with_servers_count'  => true,
                'with_hosting_count'  => true,
                'with_contacts_count' => true,
            ]),
            'totalCount' => []
        ];

        if (Yii::$app->user->can('manage')) {
            if (Yii::getAlias('@domain', false)) {
                $options['totalCount']['domains'] = Domain::find()->where(['states' => 'ok,incoming,outgoing,expired'])->count();
            }
            if (Yii::getAlias('@server', false)) {
                $options['totalCount']['servers'] = Server::find()->count();
            }
            if (Yii::getAlias('@ticket', false)) {
                $options['totalCount']['tickets'] = Thread::find()->count();
            }
        }

        return $this->render('index', $options);
    }
}
