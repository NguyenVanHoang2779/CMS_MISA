<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = "View : " . " " . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Change password', ['change-password', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'username',
            [
                'label' => Yii::t('backend', 'Full name'),
                'value' => $model->firstname . ' ' . $model->lastname,
            ],

            'email:email',
            [
                'attribute' => 'gender',
                'format' => 'html',
                'value' => function ($object) {
//                    Yii::error("===> " . \yii\helpers\VarDumper::dumpAsString($object->status));
                    return Html::tag('i', null, [
                        'class' => $object->gender == 0 ? 'fa fa-female' : 'fa-male'
                    ]);
                } ,
            ],
            'phonenumber',
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
            [
//                'attribute' => 'user_type',
                'label' => Yii::t('backend', 'User from'),
                'visible' => !empty($model->branch_id) || !empty($model->ho_id) || !empty($model->partner_id),
                'value' => !empty($model->ho) ? Yii::t('backend', 'Head Officer') : (
                !empty($model->branch_id) ? Yii::t('backend', 'Branch Officer') :
                    (!empty($model->partner_id)  ? Yii::t('backend', 'Partner Officer') : ''))
            ],
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

//            'verification_token',
        ],
    ]) ?>
</div>
