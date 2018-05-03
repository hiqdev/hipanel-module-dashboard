<?php

namespace hipanel\modules\dashboard\tests\acceptance\client;

use hipanel\tests\_support\Step\Acceptance\Client;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Client $I)
    {
        $I->login();
        $I->amOnPage(Url::to(['/']));
        $I->seeInCurrentUrl('/dashboard/dashboard');
        $I->see('Dashboard');
        $I->performOn('.content-wrapper', \Codeception\Util\ActionSequence::build()
            ->see('Domains')
            ->see('Servers')
            ->see('Tickets')
            ->see('Finance')
            ->dontSee('Clients')
            ->dontSee('Tariffs')
            ->dontSee('Models')
        );
    }
}
