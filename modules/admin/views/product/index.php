<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12 product-index">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'name',
                        'label'=>'Наименование',
                    ],
                    [
                        'attribute'=>'description',
                        'label'=>'Описание',
                    ],
                    [
                        'attribute'=>'category_id',
                        'label'=>'Категория',
                        'format'=>'text', // Возможные варианты: raw, html
                        'content'=>function($data){
                            return $data->category->name;
                        }
                    ],
                    [
                        'attribute'=>'manufacturer_id',
                        'label'=>'Производитель',
//                        'format'=>'text', // Возможные варианты: raw, html
                        'content'=>function($data){
                            return $data->manufacturer->name;
                        }
                    ],
                    [
                        'attribute'=>'price',
                        'label'=>'Описание',
                    ],
                    // 'image',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>