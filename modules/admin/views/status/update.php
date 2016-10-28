<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Изменить статус: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="col-md-4 status-update">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($model->name) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">

            <?= $this->render('_form', [
                'model' => $model,
                'colors' => $colors,
            ]) ?>

        </div>
    </div>
</div>