<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Update Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<div class="row">
    <?php $form = ActiveForm::begin([
        'id' => 'category-form',
        'options' => ['class' => 'signup-form form-register1'],
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'desc')->textInput(); ?>

    <div class="col-md-6" style="margin-top: 100px;">
        <?php if (!empty($products)): ?>


            <?php foreach ($products as $key => $product): ?>
                    <h3><?= $product->name ?> </h3>
                    <?= $form->field($product, "[$key]id")
                        ->hiddenInput()
                        ->label(false); ?>
                    <?= $form->field($product, "[$key]name")
                        ->textInput(); ?>
                    <?= $form->field($product, "[$key]description")
                        ->textInput(); ?>
                    <hr>
            <?php endforeach; ?>

            <div class="form-group">
                <?= Html::submitButton('не работает', ['class' => 'btn btn-success pull-right']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        <?php endif; ?>
    </div>

</div>