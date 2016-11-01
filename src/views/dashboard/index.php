<?php

use hipanel\modules\dashboard\widgets\ObjectsCountWidget;
use yii\helpers\Html;

$this->title = Yii::t('hipanel/dashboard', 'Dashboard');

/**
 * @var array $totalCount
 * @var \hipanel\modules\client\models\Client $model
 */

?>

<div class="row">
    <?php if (Yii::getAlias('@domain', false)) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?php if ($model->count['domains'] || Yii::$app->user->can('support')) : ?>
                            <?= Html::a(Yii::t('hipanel', 'View'), '@domain/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php endif ?>
                        <?php if (Yii::$app->user->can('deposit')) : ?>
                            <?= Html::a(Yii::t('hipanel', 'Buy'), '@domain/buy', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php endif ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('hipanel', 'Domains') ?></span>
                    <span class="info-box-number">
                        <?= ObjectsCountWidget::widget([
                            'totalCount' => $totalCount['domains'],
                            'ownCount' => $model->count['domains'],
                        ]) ?>
                    </span>
                    <?php if ($model->count['contacts']) : ?>
                        <span class="info-box-number">
                            <span style="font-weight:normal"><?= Yii::t('hipanel', 'Contacts') ?>:</span>
                            <?= $model->count['contacts'] ?>&nbsp;
                            <?= Html::a(Yii::t('hipanel', 'View'), '@contact/index', ['class' => 'btn btn-xs btn-default']) ?>
                        </span>
                    <?php endif ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php endif ?>

    <?php if (Yii::getAlias('@server', false)) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-server"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?php if ($model->count['servers'] || Yii::$app->user->can('support')) : ?>
                            <?= Html::a(Yii::t('hipanel', 'View'), '@server/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php endif ?>
                        <?php if (Yii::$app->user->can('deposit')) : ?>
                            <?= Html::a(Yii::t('hipanel', 'Buy'), '@server/buy', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php endif ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('hipanel', 'Servers') ?></span>
                    <span class="info-box-number">
                        <?= ObjectsCountWidget::widget([
                            'totalCount' => $totalCount['servers'],
                            'ownCount' => $model->count['servers'],
                        ]) ?>
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php endif ?>

    <?php if (Yii::getAlias('@ticket', false)) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-ticket"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?= Html::a(Yii::t('hipanel', 'View'), '@ticket/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?= Html::a(Yii::t('hipanel', 'Create'), '@ticket/create', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('hipanel', 'Tickets') ?></span>
                <span class="info-box-number">
                        <?= ObjectsCountWidget::widget([
                            'totalCount' => $totalCount['tickets'],
                            'ownCount' => $model->count['tickets'],
                        ]) ?>
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php endif ?>

    <?php if (Yii::getAlias('@bill', false) && Yii::$app->user->can('deposit')) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?= Html::a(Yii::t('hipanel', 'View'), '@bill/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?= Html::a(Yii::t('hipanel', 'Recharge'), '@pay/deposit', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('hipanel', 'Balance') ?></span>
                    <span class="info-box-number">
                        <span
                            style="font-size:130%"><?= Yii::$app->formatter->asCurrency($model->balance,
                                $model->currency) ?></span>
                    </span>
                    <?php if ($model->credit > 0) : ?>
                        <span class="info-box-number">
                        <span style="font-weight:normal"><?= Yii::t('hipanel', 'Credit') ?>:</span>
                            <?= Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?>
                        </span>
                    <?php endif ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php endif ?>
</div>
