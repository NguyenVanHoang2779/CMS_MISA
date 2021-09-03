<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\bootstrap4\ActiveForm */
$UserTypeList = [
    1 => 'Branch',
    2 => 'HO',
    3 => 'Partner'
];
$list = [0 => 'Male', 1 => 'Female', 2 => 'Other'];
$statuslist = [10 => 'Active', 9 => 'Inactive'];
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput([ 'disabled' => 'disabled',]) ?>
        </div>


    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phonenumber', [
            ])->textInput(['placeholder' => '']); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropdownList($statuslist) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gender')->dropdownList($list) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'user_type')->dropDownList($UserTypeList, ['id' => 'user_type', 'prompt' => 'Select Type',
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'unit')->widget(DepDrop::classname(), [
                'data' => $model->departementID ? [$model->departementID =>$model->departementName] : [] ,
                'options' => ['id' => 'type-id'],
                'pluginOptions' => [
                    'depends' => ['user_type'],
                    'url' => \yii\helpers\Url::to(['/user/query-type'])
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
