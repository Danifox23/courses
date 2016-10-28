<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4 order-view">
    <div class="card">
        <div class="header">
            <h4 class="title">Заказ №<?= Html::encode($model->id) ?></h4>
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
                    [
                        'attribute'=>'user_id',
                        'format'=>'raw',
                        'value'=> $model->user->name .' <span class="text-muted"> ('. $model->user->id .')</span>',
                    ],
                    'total',
                    'quantity',
                    'name',
                    'email:email',
                    'phone',
                    'address',
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'value'=> date('d-m-Y (H:i:s)',$model->date),
                    ],
                    [
                        'attribute'=>'date_edit',
                        'format'=>'raw',
                        'value'=> date('d-m-Y (H:i:s)',$model->date_edit),
                    ],
                    [
                        'attribute'=>'status_id',
                        'format'=>'raw',
                        'value'=> '<span class="order-status '. $model->status->color .'">'.$model->status->name.'</span>',
                    ],
                ],
                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>

<div class="col-md-8 ">
    <div class="card">
        <div class="header">
            <h4 class="title">Товары в заказе <sup><?= $positions->getCount(); ?></sup></h4>
            <p class="model-desc"><?= $model->quantity ?> позиций</p>
        </div>
        <div class="content">
            <?= GridView::widget([
                'dataProvider' => $positions,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'name',
                        'label' => 'Наименование',
                        'content' => function($data)
                        {
                            return '<a href="'. Url::to(['product/view/', 'id' => $data->product_id]) .'">'. $data->name .'</a>';
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'label' => 'Цена',
                    ],
                    [
                        'attribute' => 'quantity',
                        'label' => 'Кол-во',
                    ],
                    [
                        'attribute' => 'total',
                        'label' => 'Итого',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'template' => '{view} {update} {delete}{link}',
                        'urlCreator' => function ($action, $data) {
                            return \yii\helpers\Url::to(['product/' . $action, 'id' => $data->id]);
                        }
                    ],
//                    [
//                        'label' => '',
//                        'format' => 'raw',
//                        'value' => function ($data) {
//                            return Html::a(
//                                'Изменить',
//                                '#',
//                                [
//                                    'data-target' => '#UpdateProduct',
//                                    'data-toggle' => 'modal',
//                                    'class' => 'update-product',
//                                    'data-product-id' => $data->id,
//                                ]
//                            );
//                        }
//                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>