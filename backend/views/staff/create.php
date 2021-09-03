<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Staffmisa */

$this->title = 'Thông tin nhân viên ';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffmisa-create">
    <div style="display: flex;">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="phancap">
            <div class="form-check lanhanvien">
                <input class="form-check-input lanhanvien1 " type="checkbox" value="0" id="flexCheckDefault" name="Staffmisa[keychucdanh]">
                <label class="form-check-label" for="flexCheckDefault">
                    Là nhân viên
                </label>
            </div>
            <div class="form-check lanhanvien2">
                <input class="form-check-input lanhanvien3" type="checkbox" value="1" id="flexCheckDefault" name="Staffmisa[keychucdanh]">
                <label class="form-check-label" for="flexCheckDefault">
                    là nhà cung cấp
                </label>
            </div>
        </div>
    </div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
