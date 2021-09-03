<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StaffmisaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhân viên ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffmisa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm ', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'manhanvien',
            'tennhanvien',
            'donvi',
            'chucdanh',
            //'noicap',
            //'diachi',
            //'email:email',
            //'tennganhang',
            //'chinhanh',
            //'keychucdanh',
            //'gioitinh',
            //'socmnd',
            //'sodienthoai',
            //'sodienthoaicodinh',
            //'taikhoannganhang',
            //'ngaysinh',
            //'ngaycap',
            //'staffmisacol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
