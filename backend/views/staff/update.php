<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Staffmisa */

$this->title = 'Cập nhật ' ;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="staffmisa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
