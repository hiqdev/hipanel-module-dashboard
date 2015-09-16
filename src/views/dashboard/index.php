<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');

?>

<div class="row">
<? if (Yii::getAlias('@domain', false)) { ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <? if ($model->count['domains']>1) { ?>
                        <?= Html::a(Yii::t('app', 'view'), '@domain/index', ['class' => 'btn btn-xs btn-default']) ?>
                    <? } ?>
                    <?= Html::a(Yii::t('app', 'buy'), '@domain/buy', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text"><?= Yii::t('app', 'Domains') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['domains'] ?></span>
                </span>
            <? if ($model->count['contacts']>1) { ?>
                <span class="info-box-number">
                    <span style="font-weight:normal"><?= Yii::t('app', 'Contacts') ?>:</span> <?= $model->count['contacts'] ?>&nbsp;
                    <?= Html::a(Yii::t('app', 'view'), '@contact/index', ['class' => 'btn btn-xs btn-default']) ?>
                </span>
            <? } ?>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
<? } ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-server"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <? if ($model->count['servers']>1) { ?>
                        <?= Html::a(Yii::t('app', 'view'), '@server/index', ['class' => 'btn btn-xs btn-default']) ?>
                    <? } ?>
                    <?= Html::a(Yii::t('app', 'buy'), '@server/buy', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text"><?= Yii::t('app', 'Servers') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['servers'] ?></span>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ticket"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <?= Html::a(Yii::t('app', 'view'),   '@ticket/index',  ['class' => 'btn btn-xs btn-default']) ?>
                    <?= Html::a(Yii::t('app', 'create'), '@ticket/create', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text"><?= Yii::t('app', 'Tickets') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['tickets'] ?></span>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <?= Html::a(Yii::t('app', 'view'),     '@bill/index',   ['class' => 'btn btn-xs btn-default']) ?>
                    <?= Html::a(Yii::t('app', 'recharge'), '@bill/deposit', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text"><?= Yii::t('app', 'Balance') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= Yii::$app->formatter->asCurrency($model->balance, $model->currency) ?></span>
                </span>
            <? if ($model->credit > 0) { ?>
                <span class="info-box-number">
                    <span style="font-weight:normal"><?= Yii::t('app', 'Credit') ?>:</span>
                    <?= Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?>
                </span>
            <? } ?>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>
