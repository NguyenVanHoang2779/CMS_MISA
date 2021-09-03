<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use backend\compoments\models\Menu;
use yii\helpers\Json;
use yii\web\JsExpression;
use backend\compoments\assets\AutocompleteAsset;
use kartik\widgets\Select2;
use yii\web\View;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\compoments\models\Menu */
/* @var $form yii\bootstrap4\ActiveForm */
$menuIcons = Yii::$app->params['menu-icon'];
$dataIcon = [];
foreach ($menuIcons as $icon) {
    $dataIcon[$icon] = $icon;
}

AutocompleteAsset::register($this);

//$dataMenu = \backend\compoments\admin\MenuHelper::getMenuData();


//$opts = Json::htmlEncode([
//    'menus' => Menu::getMenuSource(),
//    'routes' => Menu::getSavedRoutes(),
//]);
//$this->registerJs("var _opts = $opts;");


//$this->registerJs($this->render('_script.js'));
//$dataMenu = Json::htmlEncode([
//
//]);
//$this->registerJs("var _menuData = $data2;");
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="col-sm-6">


            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <div>
                <?php

                echo '<label class="control-label">Parent</label>';
                $template = '<div><p class="repo-name">{{name}}</p>' .
                    '<p class="repo-description">{{route}} | {{parent_name}}</p></div>';
                echo Typeahead::widget([
                    'model' => $model,
                    'attribute' => 'parent_name',
                    'options' => [ 'autocomplete' => 'off'],
                    'scrollable' => true,
                    'dataset' => [
                        [
                            'limit' => 10,
                            'prefetch' => ['url' => Url::to(['/menu/data']), 'cache' => false],
                            'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('name')", //tiem kiem gia tri doi chieu
                            'display' => 'name', //du lieu hien thi sau khi chon
                            'templates' => [
                                'notFound' => '<div class="text-danger" style="padding:0 8px">Unable to find repositories for selected query.</div>',
                                'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
                            ],
                        ],

                    ],
                    'pluginEvents' =>  [
                        'typeahead:selected' => 'function(e, d) { 
                        console.log(d);
                        $("#parent_id").val(d.id); 
                    }'
                    ],
                ]);
                ?>
            </div
                    <!---->
            <div>
                <?php
                echo '<label class="control-label">Route</label>';
                echo Typeahead::widget([
                    'attribute' => 'route',
                    'model' => $model,
                    'options' => ['placeholder' => '', 'autocomplete' => 'off'],
                    'defaultSuggestions' => Menu::getSavedRoutes(), // you can set it to your own array
                    'pluginOptions' => ['highlight' => true],
                    'scrollable' => true,
                    'dataset' => [
                        [
                            'local' => Menu::getSavedRoutes(),
                            'limit' => 10
                        ]
                    ]
                ]);
                ?>
            </div>

        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'order')->input('number') ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="icon">Icon</label>
            <?php
            $format = <<< SCRIPT
                    function format(state) {
                        if (!state.id) return state.text; // optgroup
                        return '<i class="' + state.id + '"></i> ' + state.text;
                    }
SCRIPT;
            $escape = new JsExpression("function(m) { return m; }");
            $this->registerJs($format, View::POS_HEAD);
            ?>
            <?=
            Select2::widget([
                'name' => 'Menu[icon]',
                'data' => $dataIcon,
                'value' => $model->icon,
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'templateResult' => new JsExpression('format'),
                    'templateSelection' => new JsExpression('format'),
                    'escapeMarkup' => $escape,
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
    <br>
    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-custom', 'Create') : Yii::t('rbac-custom', 'Update'), ['class' => $model->isNewRecord
            ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
