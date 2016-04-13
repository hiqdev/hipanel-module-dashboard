<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');

?>

<div class="row">
    <?php if (Yii::getAlias('@domain', false)) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?php if ($model->count['domains']) { ?>
                            <?= Html::a(Yii::t('app', 'View'), '@domain/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php } ?>
                        <?= Html::a(Yii::t('app', 'Buy'), '@domain/buy', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('app', 'Domains') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['domains'] ?></span>
                </span>
                    <?php if ($model->count['contacts']) { ?>
                        <span class="info-box-number">
                    <span style="font-weight:normal"><?= Yii::t('app', 'Contacts') ?>
                        :</span> <?= $model->count['contacts'] ?>&nbsp;
                            <?= Html::a(Yii::t('app', 'View'), '@contact/index', ['class' => 'btn btn-xs btn-default']) ?>
                </span>
                    <?php } ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php } ?>

    <?php if (Yii::getAlias('@server', false)) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-server"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?php if ($model->count['servers']) { ?>
                            <?= Html::a(Yii::t('app', 'View'), '@server/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?php } ?>
                        <?= Html::a(Yii::t('app', 'Buy'), '@server/buy', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('app', 'Servers') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['servers'] ?></span>
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php } ?>

    <?php if (Yii::getAlias('@ticket', false)) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-ticket"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?= Html::a(Yii::t('app', 'View'), '@ticket/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?= Html::a(Yii::t('app', 'Create'), '@ticket/create', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('app', 'Tickets') ?></span>
                <span class="info-box-number">
                    <span style="font-size:130%"><?= $model->count['tickets'] ?></span>
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php } ?>

    <?php if (Yii::getAlias('@bill', false)) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                    <div class="pull-right btn-group">
                        <?= Html::a(Yii::t('app', 'View'), '@bill/index', ['class' => 'btn btn-xs btn-default']) ?>
                        <?= Html::a(Yii::t('app', 'Recharge'), '@pay/deposit', ['class' => 'btn btn-xs btn-default']) ?>
                    </div>
                    <span class="info-box-text"><?= Yii::t('app', 'Balance') ?></span>
                <span class="info-box-number">
                    <span
                        style="font-size:130%"><?= Yii::$app->formatter->asCurrency($model->balance, $model->currency) ?></span>
                </span>
                    <?php if ($model->credit > 0) { ?>
                        <span class="info-box-number">
                    <span style="font-weight:normal"><?= Yii::t('app', 'Credit') ?>:</span>
                            <?= Yii::$app->formatter->asCurrency($model->credit, $model->currency) ?>
                </span>
                    <?php } ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    <?php } ?>
</div>
