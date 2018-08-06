<?php

namespace hipanel\modules\dashboard\tests\acceptance\admin;

use hipanel\tests\_support\Step\Acceptance\Admin;
use Yii;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Admin $I)
    {
        $I->login();
        $I->amOnPage(Url::to(['/']));
        $I->seeInCurrentUrl('/dashboard/dashboard');
        $I->see('Dashboard');
        $I->performOn('.content-wrapper', function () use ($I) {
            Yii::getAlias('@client', false) ? $I->see('Clients') : null;
            Yii::getAlias('@domain', false) ? $I->see('Domains') : null;
            Yii::getAlias('@server', false) ? $I->see('Servers') : null;
            Yii::getAlias('@ticket', false) ? $I->see('Tickets') : null;
            Yii::getAlias('@model', false) ? $I->see('Models') : null;
            Yii::getAlias('@part', false) ? $I->see('Parts') : null;
            $I->dontSee('Tariffs');
            $I->dontSee('Finance');
        });
    }
}
