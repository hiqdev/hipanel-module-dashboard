<?php

use hipanel\modules\client\models\ClientSearch;
use hipanel\modules\client\widgets\combo\ClientCombo;
use hipanel\modules\dashboard\widgets\ObjectsCountWidget;
use hipanel\modules\dashboard\widgets\SearchForm;
use hipanel\modules\dashboard\widgets\SmallBox;
use hipanel\modules\domain\models\DomainSearch;
use hipanel\modules\finance\models\BillSearch;
use hipanel\modules\server\models\ServerSearch;
use hipanel\modules\stock\models\ModelSearch;
use hipanel\modules\stock\models\PartSearch;
use hipanel\modules\ticket\models\ThreadSearch;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('hipanel.dashboard', 'Dashboard');

$user = Yii::$app->user;

/**
 * @var array
 * @var \hipanel\modules\client\models\Client $model
 */
?>

<div class="row">
    <?php if (Yii::getAlias('@domain', false)) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel', 'Domains'),
            ]) ?>
            <?php $box->beginBody() ?>
            <?= ObjectsCountWidget::widget([
                'totalCount' => $totalCount['domains'],
                'ownCount' => $model->count['domains'],
            ]) ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'domain-search',
                    'action' => Url::to('@domain/index'),
                ],
                'model' => new DomainSearch(),
                'attribute' => 'domain_like',
                'buttonColor' => SmallBox::COLOR_AQUA,
            ]) ?>
            <div class="clearfix"></div>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@domain/index', ['class' => 'small-box-footer']) ?>
            <?php if ($model->count['contacts']) : ?>
                <?= Html::a(Yii::t('hipanel', 'Contacts') . ': ' . $model->count['contacts'] . $box->icon(), '@contact/index', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php if ($user->can('deposit')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Buy') . $box->icon('fa-shopping-cart'), '/domain/check', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@server', false) && $user->can('server.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel', 'Servers'),
                'boxIcon' => 'fa-server',
                'boxColor' => SmallBox::COLOR_TEAL,
            ]) ?>
            <?php $box->beginBody() ?>
            <?= ObjectsCountWidget::widget([
                'totalCount' => $totalCount['servers'],
                'ownCount' => $model->count['servers'],
            ]) ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'server-search',
                    'action' => Url::to('@server/index'),
                ],
                'model' => new ServerSearch(),
                'attribute' => 'name_like',
                'buttonColor' => SmallBox::COLOR_TEAL,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?php if ($model->count['servers'] || $user->can('support')) : ?>
                <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@server/index', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php if ($user->can('deposit')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Buy') . $box->icon('fa-shopping-cart'), '@server/buy', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@ticket', false) && $user->can('ticket.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel', 'Tickets'),
                'boxIcon' => 'fa-ticket',
                'boxColor' => SmallBox::COLOR_ORANGE,
            ]) ?>
            <?php $box->beginBody() ?>
            <?= ObjectsCountWidget::widget([
                'totalCount' => $totalCount['tickets'],
                'ownCount' => $model->count['tickets'],
            ]) ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'ticket-search',
                    'action' => Url::to('@ticket/index'),
                ],
                'model' => new ThreadSearch(),
                'attribute' => 'anytext_like',
                'buttonColor' => SmallBox::COLOR_ORANGE,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@ticket/index', ['class' => 'small-box-footer']) ?>
            <?= Html::a(Yii::t('hipanel', 'Create') . $box->icon('fa-plus'), '@ticket/create', ['class' => 'small-box-footer']) ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@bill', false) && $user->can('bill.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel:finance', 'Finance'),
                'boxIcon' => 'fa-money',
                'boxColor' => SmallBox::COLOR_RED,
            ]) ?>
            <?php $box->beginBody() ?>
            <span
                style="font-size: 18px"><?= Yii::$app->formatter->asCurrency($model->balance, $model->currency) ?></span>
            <br>
            <?php if ($model->credit > 0) : ?>
                <span><?= Yii::t('hipanel', 'Credit') . ' ' . Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?></span>
            <?php endif ?>
            <?php if ($user->can('manage')) : ?>
                <br>
                <?= SearchForm::widget([
                    'formOptions' => [
                        'id' => 'bill-search',
                        'action' => Url::to('@bill/index'),
                    ],
                    'model' => new BillSearch(),
                    'attribute' => 'client_id',
                    'inputWidget' => ClientCombo::class,
                    'buttonColor' => SmallBox::COLOR_RED,
                ]) ?>
            <?php endif; ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@bill/index', ['class' => 'small-box-footer']) ?>
            <?php if ($user->can('deposit')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Recharge') . $box->icon('fa-credit-card-alt'), '@pay/deposit', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@part', false) && $user->can('part.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel:stock', 'Parts'),
                'boxIcon' => 'fa-cubes',
                'boxColor' => SmallBox::COLOR_YELLOW,
            ]) ?>
            <?php $box->beginBody() ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'part-search',
                    'action' => Url::to('@part/index'),
                ],
                'model' => new PartSearch(),
                'attribute' => 'serial_like',
                'buttonColor' => SmallBox::COLOR_YELLOW,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
                <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@part/index', ['class' => 'small-box-footer']) ?>
                <?php if ($user->can('part.create')) : ?>
                    <?= Html::a(Yii::t('hipanel', 'Create') . $box->icon('fa-plus'), '@part/create', ['class' => 'small-box-footer']) ?>
                <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@model', false) && $user->can('model.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel:stock', 'Models'),
                'boxIcon' => 'fa-cubes',
                'boxColor' => SmallBox::COLOR_BLUE,
            ]) ?>
            <?php $box->beginBody() ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'model-search',
                    'action' => Url::to('@model/index'),
                ],
                'model' => new ModelSearch(),
                'attribute' => 'model_like',
                'buttonColor' => SmallBox::COLOR_BLUE,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
                <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@model/index', ['class' => 'small-box-footer']) ?>
                <?php if ($user->can('model.create')) : ?>
                    <?= Html::a(Yii::t('hipanel', 'Create') . $box->icon('fa-plus'), '@model/create', ['class' => 'small-box-footer']) ?>
                <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@client', false) && $user->can('client.read')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel', 'Clients'),
                'boxIcon' => 'fa-users',
                'boxColor' => SmallBox::COLOR_FUCHSIA,
            ]) ?>
            <?php $box->beginBody() ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'client-search',
                    'action' => Url::to('@client/index'),
                ],
                'model' => new ClientSearch(),
                'attribute' => 'login_ilike',
                'buttonColor' => SmallBox::COLOR_FUCHSIA,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@client/index', ['class' => 'small-box-footer']) ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@tariff', false) && $user->can('manage')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel:finance', 'Tariffs'),
                'boxIcon' => 'fa-usd',
                'boxColor' => SmallBox::COLOR_GREEN,
            ]) ?>
            <?php $box->beginBody() ?>
            <br>
            <br>
            <?= SearchForm::widget([
                'formOptions' => [
                    'id' => 'client-search',
                    'action' => Url::to('@client/index'),
                ],
                'model' => new ClientSearch(),
                'attribute' => 'tariff_like',
                'buttonColor' => SmallBox::COLOR_GREEN,
            ]) ?>
            <?php $box->endBody() ?>
            <?php $box->beginFooter() ?>
            <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@tariff/index', ['class' => 'small-box-footer']) ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>
</div>
