<?php

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

$this->title = Yii::t('hipanel:dashboard', 'Dashboard');

/**
 * @var array $totalCount
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
            <?php if (Yii::$app->user->can('support')) : ?>
                <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@domain/index', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php if ($model->count['contacts']) : ?>
                <?= Html::a(Yii::t('hipanel', 'Contacts') . ': ' . $model->count['contacts'] . $box->icon(), '@contact/index', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php if (Yii::$app->user->can('deposit')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Buy') . $box->icon('fa-shopping-cart'), '@domain/buy', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@server', false)) : ?>
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
            <?php if ($model->count['servers'] || Yii::$app->user->can('support')) : ?>
                <?= Html::a(Yii::t('hipanel', 'View') . $box->icon(), '@server/index', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php if (Yii::$app->user->can('deposit')) : ?>
                <?= Html::a(Yii::t('hipanel', 'Buy') . $box->icon('fa-shopping-cart'), '@server/buy', ['class' => 'small-box-footer']) ?>
            <?php endif ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@ticket', false)) : ?>
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

    <?php if (Yii::getAlias('@bill', false) && (Yii::$app->user->can('deposit') || Yii::$app->user->can('manage'))) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php $box = SmallBox::begin([
                'boxTitle' => Yii::t('hipanel/finance', 'Finance'),
                'boxIcon' => 'fa-money',
                'boxColor' => SmallBox::COLOR_RED,
            ]) ?>
            <?php $box->beginBody() ?>
            <span
                style="font-size: 18px"></span><?= Yii::$app->formatter->asCurrency($model->balance, $model->currency) ?>
            <?php if ($model->credit > 0) : ?>
                <small><?= Yii::t('hipanel', 'Credit') . ' ' . Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?></small>
            <?php endif ?>
            <?php if (Yii::$app->user->can('manage')) : ?>
                <br>
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
            <?= Html::a(Yii::t('hipanel', 'Recharge') . $box->icon('fa-credit-card-alt'), '@pay/deposit', ['class' => 'small-box-footer']) ?>
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

    <?php if (Yii::getAlias('@part', false) && Yii::$app->user->can('manage')) : ?>
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
            <?php $box->endFooter() ?>
            <?php $box::end() ?>
        </div>
    <?php endif ?>

</div>
