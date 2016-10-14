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
        'id' => 'modal-form',
        'options' => ['enctype' => 'multipart/form-data'],
        'method' => 'post',
        'action' => ['/admin/product/updatem', 'id' => $model->id],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'manufacturer_id')->dropDownList(ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'purchase_price')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <?= $form->field($model, 'image')->fileInput() ?>

    <!--    Для перенаправления на страницу с категрией-->
    <?= $form->field($model, 'category_id')->hiddenInput(['value' => $category_id]); ?>

    <div class="form-group">
<!--        --><?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
