<?php

namespace hipanel\modules\dashboard\tests\acceptance\admin;

use hipanel\tests\_support\Step\Acceptance\Admin;
use yii\helpers\Url;

class DashboardCest
{
    public function ensureThatDashboardWorks(Admin $I)
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
            ->dontSee('Tariffs')
            ->dontSee('Finance')
        );
    }
}
