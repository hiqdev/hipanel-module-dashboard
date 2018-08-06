<?php

namespace hipanel\modules\dashboard\tests\acceptance\seller;

use hipanel\tests\_support\Step\Acceptance\Seller;
use Yii;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Seller $I)
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
            Yii::getAlias('@finance', false) ? $I->see('Finance') : null;
            Yii::getAlias('@tariff', false) ? $I->see('Tariffs') : null;
            Yii::getAlias('@model', false) ? $I->see('Models') : null;
            Yii::getAlias('@part', false) ? $I->see('Parts') : null;
        });
    }
}
