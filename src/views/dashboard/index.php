<?php

use hipanel\modules\dashboard\menus\DashboardMenu;

$this->title = Yii::t('hipanel.dashboard', 'Dashboard');

?>

<div class="row">
    <?= DashboardMenu::widget() ?>
</div>
