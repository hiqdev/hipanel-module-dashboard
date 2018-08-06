<?php

namespace hipanel\modules\dashboard\tests\acceptance\client;

use hipanel\tests\_support\Step\Acceptance\Client;
use Yii;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Client $I)
    {
        $I->login();
        $I->amOnPage(Url::to(['/']));
        $I->seeInCurrentUrl('/dashboard/dashboard');
        $I->see('Dashboard');
        $I->performOn('.content-wrapper', function () use ($I) {
            Yii::getAlias('@domain', false) ? $I->see('Domains') : null;
            Yii::getAlias('@server', false) ? $I->see('Servers') : null;
            Yii::getAlias('@ticket', false) ? $I->see('Tickets') : null;
            Yii::getAlias('@finance', false) ? $I->see('Finance') : null;
            $I->dontSee('Clients');
            $I->dontSee('Tariffs');
            $I->dontSee('Models');
            $I->dontSee('Parts');
        });
    }
}
