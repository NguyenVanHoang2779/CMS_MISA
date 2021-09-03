<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \backend\compoments\models\Menu */

$this->title = Yii::t('rbac-custom', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' =>  Yii::t('rbac-custom', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
