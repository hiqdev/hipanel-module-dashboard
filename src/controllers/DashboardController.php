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
use hipanel\modules\domain\models\Domain;

/**
 * Dashboard controller.
 *
 * Simply empty: does only render index.
 */
class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
