<?php

namespace hipanel\modules\dashboard\tests\acceptance\seller;

use hipanel\tests\_support\Step\Acceptance\Seller;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Seller $I)
    {
        $I->login();
        $I->amOnPage(Url::to(['/']));
        $I->seeInCurrentUrl('/dashboard/dashboard');
        $I->see('Dashboard');
        $I->performOn('.content-wrapper', \Codeception\Util\ActionSequence::build()
            ->see('Clients')
            ->see('Domains')
            ->see('Servers')
            ->see('Parts')
            ->see('Models')
            ->see('Tickets')
            ->see('Tariffs')
            ->see('Finance')
        );
    }
}
