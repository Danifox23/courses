<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Product;

/* @var $this yii\web\View */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h4 class="title">Изображение</h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <?= Html::img('@web/'.$model->getImage()->getPath('1000x3000'));?>
        </div>
    </div>
</div>
<div class="col-md-8 product-view">
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
                    'description',
                    [
                        'attribute' => 'category_id',
                        'value' => $model->category->name,
                    ],
                    'purchase_price',
                    'price',
                    [
                        'attribute' => 'manufacturer_id',
                        'value' => $model->manufacturer->name,
                    ],
                    [
                        'attribute' => 'show_main',
                        'value' => $model->show_main == 1 ? 'Да' : 'Нет',
                    ],
                    [
                        'attribute' => 'sale',
                        'value' => $model->sale == 1 ? 'Да' : 'Нет',
                    ],
                ],
                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>