<?php

use hipanel\modules\dashboard\menus\DashboardMenu;

$this->title = Yii::t('hipanel.dashboard', 'Dashboard');

?>

<?= DashboardMenu::widget() ?>
