<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Product;

/* @var $this yii\web\View */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h4 class="title">Изображение</h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <?= Html::img('@web/'.$model->getImage()->getPathToOrigin(), ['class' => 'img-responsive']);?>
        </div>
    </div>
</div>
<div class="col-md-8 blog-view">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'attribute' => 'text',
                        'format' => 'raw',
                    ],
                    'author',
                ],
            ]) ?>

        </div>
    </div>
</div>