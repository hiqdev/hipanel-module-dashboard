<?php

namespace hipanel\modules\dashboard\tests\acceptance\seller;

use hipanel\tests\_support\DashboardHelper\DashboardSearchBox;
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
        });
    }

    /**
     * @param Seller $I
     */
    public function ensureFinanceSearchBoxIsValid(Seller $I)
    {
        $formAction = '/finance/bill/index';
        $inputName  = 'BillSearch[client_id]';
        $typeInput  = 'select';
        (new DashboardSearchBox($I))->ensureSearchBoxContains($formAction, $inputName, $typeInput);
    }

    /**
     * @param Seller $I
     */
    public function ensureTariffSearchBoxIsValid(Seller $I)
    {
        $formAction = '/finance/plan/index';
        $inputName  = 'PlanSearch[name_ilike]';
        $typeInput  = 'input';
        (new DashboardSearchBox($I))->ensureSearchBoxContains($formAction, $inputName, $typeInput);
    }
}

