<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\depdrop\DepDrop;


/* @var $this yii\web\View */
/* @var $model common\models\User */
///* @var $form yii\bootstrap4\ActiveForm */
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
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'password')->passwordInput([
                'placeHolder' => ''
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'password_repeat')->passwordInput([
                'placeHolder' => ''
            ])->label(Yii::t('backend', 'Password repeat')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-3">
            <?= $form->field($model, 'user_type')->dropDownList($UserTypeList, [
                'id' => 'user_type',
                'prompt' => 'Select Type',
            ])->label(Yii::t('backend', 'User from')); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'unit')->widget(DepDrop::classname(), [
                'options' => ['id' => 'type-id'],
                'pluginOptions' => [
                    'depends' => ['user_type'],
                    [
                        'attribute' => 'ho_id',
                        'visible' => !empty($model->ho_id),
                        'value' => empty($model->ho) ? '' : $model->ho->name,
                    ],
                    [
                        'attribute' => 'branch_id',
                        'visible' => !empty($model->branch_id),
                        'value' => empty($model->branch) ? '' : $model->branch->name,
                    ],
                    [
                        'attribute' => 'partner_id',
                        'visible' => !empty($model->partner_id),
                        'value' => empty($model->partner) ? '' : $model->partner->name,
                    ],
                    'url' => \yii\helpers\Url::to(['/user/query-type'])
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">

    </div>

    <div class="row">

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
