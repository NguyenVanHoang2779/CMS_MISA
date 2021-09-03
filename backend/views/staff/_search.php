<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StaffmisaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staffmisa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div style="display: flex">
        <div style="margin-right: 3%;">
            <?= $form->field($model, 'manhanvien') ?>
        </div>
        <div style="margin-right: 4%;">
            <?= $form->field($model, 'tennhanvien') ?>
        </div>
        <div class="form-group" style="    width: 12%;    padding-top: 30px;">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary','style' => '    margin-right: 12%;']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
