<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выгрузка из excel';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-5 product-index">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc">Для добавления товаров загрузите таблицу (xlsx)</p>
        </div>
        <div class="content">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'file_to_import')->fileInput()->label('Выерите файл') ?>

            <div class="form-group">
                <?= Html::submitButton('Выгрузить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>