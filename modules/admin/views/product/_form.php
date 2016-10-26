<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Category;
use app\models\Manufacturer;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 7, 'cols' => 5]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <hr>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'manufacturer_id')->dropDownList(ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name'), ['prompt' => 'Выберите производителя']) ?>

    <hr>

<!--    --><?/*= $form->field($model, 'show_main', ['options' => ['style' => 'margin:35px 0px 40px 0px;'], 'template' => "<label for=\"cmn-toggle\">{label}</label><div class=\"switch\">{input}<label for=\"cmn-toggle\"></label></div>"])->checkbox([
//        'value'=>0,
        'class' => 'cmn-toggle cmn-toggle-round',
        'label' => 'kjj',
//        'uncheck' => 1,
        'checked ' => $model->show_main == 1 ? true : false,
    ], false) */?>


    <?= $form->field($model, 'show_main')->checkbox([
        'label' => 'Показывать на главной',
    ]); ?>

    <?= $form->field($model, 'sale')->checkbox([
        'label' => 'Добавить лейбл "Sale"',
    ]); ?>

    <?php if($model->getImage()): ?>
        <?= Html::img('@web/'.$model->getImage()->getPath('80x80'), ['alt' => $model->name, 'class' => 'img-circle']) ?>
    <?php endif; ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
