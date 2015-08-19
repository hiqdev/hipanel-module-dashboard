<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');

?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <? if ($model->count['domains']>1) { ?>
                        <?= Html::a('view', '@domain/index', ['class' => 'btn btn-xs btn-default']) ?>
                    <? } ?>
                    <?= Html::a('buy', '@domain/buy', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text">Domains</span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['domains'] ?></span>
                </span>
            <? if ($model->count['contacts']>1) { ?>
                <span class="info-box-number">
                    <span style="font-weight:normal">Contacts:</span> <?= $model->count['contacts'] ?>&nbsp;
                    <?= Html::a('view', '@contact/index', ['class' => 'btn btn-xs btn-default']) ?>
                </span>
            <? } ?>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-server"></i></span>
            <div class="info-box-content">
                <div class="pull-right btn-group">
                    <? if ($model->count['servers']>1) { ?>
                        <?= Html::a('view', '@server/index', ['class' => 'btn btn-xs btn-default']) ?>
                    <? } ?>
                    <?= Html::a('buy', '@server/buy', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text">Servers</span>
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
                    <?= Html::a('view',   '@ticket/index',  ['class' => 'btn btn-xs btn-default']) ?>
                    <?= Html::a('create', '@ticket/create', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text">Tickets</span>
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
                    <?= Html::a('view',     '@bill/index',   ['class' => 'btn btn-xs btn-default']) ?>
                    <?= Html::a('recharge', '@bill/deposit', ['class' => 'btn btn-xs btn-default']) ?>
                </div>
                <span class="info-box-text"><?= Yii::t('app', 'Balance') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= Yii::$app->formatter->asCurrency($model->balance, $model->currency) ?></span>
                </span>
            <? if ($model->credit > 0) { ?>
                <span class="info-box-number">
                    <span style="font-weight:normal">Credit:</span>
                    <?= Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?>
                </span>
            <? } ?>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>
