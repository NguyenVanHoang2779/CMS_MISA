<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Staffmisa */

$this->title ="Thông tin nhân viên" ;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="staffmisa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa  ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'manhanvien',
            'tennhanvien',
            'donvi',
            'chucdanh',
            'noicap',
            'diachi',
            'email:email',
            'tennganhang',
            'chinhanh',
            'keychucdanh',
            'gioitinh',
            'socmnd',
            'sodienthoai',
            'sodienthoaicodinh',
            'taikhoannganhang',
            'ngaysinh',
            'ngaycap',
            'diachinganhang',
            'nhomkhachang',
            'congnothu',
            'congnotra',
        ],
    ]) ?>

</div>
