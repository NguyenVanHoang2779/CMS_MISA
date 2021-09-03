<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'firstname',
//            'lastname',
//            'fullname',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'gender',
            //'unit',
            //'phonenumber',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($object) {
//                    Yii::error("===> " . \yii\helpers\VarDumper::dumpAsString($object->status));
                    return Html::tag('span', $object->status == 10 ? 'Active' : 'Draft', [
                        'class' => $object->status == 10 ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                } ,
            ],
            //'admin',
            //'id_ho',
            //'id_partner',
            //'id_branch',
            //'created_at',
            //'updated_at',
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
//                'buttons' => [
//                    'my_button' => function ($url, $model, $key) {
//                        return Html::a('My Action', ['my-action', 'id'=>$model->id]);
//                    },
//                ]
            ],
        ],
    ]); ?>


</div>
