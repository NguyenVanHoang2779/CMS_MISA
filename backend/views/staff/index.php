<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel common\models\StaffmisaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nhân viên ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffmisa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <p style="    margin-top: 46px;
    margin-bottom: -32px;">
        <?=  Html::a(Yii::t('app', "Thêm "), ['create'], ['class' => 'btn btn-sm btn-primary' ,'style' => 'float: right;']) ?>
    </p>

    <?php $gridColumns = [
         'tennhanvien',
            'gioitinh',
            'ngaycap',
            'manhanvien',
            'ngaysinh',
            'socmnd',
            'noicap',
            'chucdanh',
            'donvi',
        ['class' => 'yii\grid\ActionColumn'],
    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'clearBuffers' => true, //optional
        'showColumnSelector' => false,
//                'exportFormOptions' => [
//                ],
        'exportConfig' => [
            ExportMenu :: FORMAT_TEXT => false,
            ExportMenu :: FORMAT_HTML => false,
            ExportMenu :: FORMAT_CSV => false,
            ExportMenu :: FORMAT_EXCEL => false,
        ]
    ]);

    // You can choose to render your own GridView separately
    echo GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]); ?>


</div>
