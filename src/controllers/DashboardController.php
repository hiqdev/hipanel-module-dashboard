<?php

/*
 * Dashboard Plugin for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2015, HiQDev (https://hiqdev.com/)
 */

namespace hipanel\modules\dashboard\controllers;

use hipanel\modules\client\controllers\ClientController;
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
        return $this->render('index', ['model' => ClientController::findModel([
            'id'                  => Yii::$app->user->identity->id,
            'with_tickets_count'  => 1,
            'with_domains_count'  => 1,
            'with_servers_count'  => 1,
            'with_hosting_count'  => 1,
            'with_contacts_count' => 1,
        ])]);
    }
}
