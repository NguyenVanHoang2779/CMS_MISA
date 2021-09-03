<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\compoments\models\MenuSearch */

$this->title = Yii::t('rbac-custom', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

<p>
    <?= Html::a(Yii::t('rbac-custom', 'Create Menu'), ['create'], ['class' => 'btn btn-primary']) ?>
</p>

<?php Pjax::begin(); ?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
//        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'menuParent.name',
            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                'class' => 'form-control', 'id' => null
            ]),
            'label' => Yii::t('rbac-custom', 'Parent'),
        ],
        'route',
        [
            'attribute' => 'icon',
            'format' => 'raw',
            'value' => function ($object) {
                $class = $object->icon;
                return '<span class="' . $class . '"></span>';
            }
        ],
        ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' =>
                [
                    'update' => Yii::$app->user->can('/menu/update'),
                    'delete' => Yii::$app->user->can('/menu/delete'),
                    'view' => Yii::$app->user->can('/menu/view')
                ]
        ],
    ],
]);
?>
<?php Pjax::end(); ?>

