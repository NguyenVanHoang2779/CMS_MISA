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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'manhanvien') ?>

    <?= $form->field($model, 'tennhanvien') ?>

    <?= $form->field($model, 'donvi') ?>

    <?= $form->field($model, 'chucdanh') ?>

    <?php // echo $form->field($model, 'noicap') ?>

    <?php // echo $form->field($model, 'diachi') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'tennganhang') ?>

    <?php // echo $form->field($model, 'chinhanh') ?>

    <?php // echo $form->field($model, 'keychucdanh') ?>

    <?php // echo $form->field($model, 'gioitinh') ?>

    <?php // echo $form->field($model, 'socmnd') ?>

    <?php // echo $form->field($model, 'sodienthoai') ?>

    <?php // echo $form->field($model, 'sodienthoaicodinh') ?>

    <?php // echo $form->field($model, 'taikhoannganhang') ?>

    <?php // echo $form->field($model, 'ngaysinh') ?>

    <?php // echo $form->field($model, 'ngaycap') ?>

    <?php // echo $form->field($model, 'staffmisacol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
