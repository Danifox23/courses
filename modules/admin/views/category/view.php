<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\AdminAsset;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\models\Product;

AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-md-6 category-view" data-id="<?= $model->id ?>">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"><?= $model->desc ?></p>
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
                    'desc',
                ],
                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>

<div class="col-md-12 products-cat">
    <div class="card">
        <div class="header">
            <h4 class="title">Товары категории <sup><?= count($products) ?></sup></h4>
            <p class="model-desc">товары, принадлежащие категории "<?= $model->name ?>"</p>
        </div>
        <div class="content">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'name',
                        'label' => 'Наименование',
                    ],
                    [
                        'attribute' => 'description',
                        'label' => 'Описание',
                    ],
                    [
                        'attribute' => 'manufacturer_id',
                        'label' => 'Производитель',
                        'format' => 'text', // Возможные варианты: raw, html
                        'content' => function ($data) {
                            return $data->manufacturer->name;
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'label' => 'Цена',
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'template' => '{view} {update} {delete}{link}',
                        'urlCreator' => function ($action, $data) {
                            return \yii\helpers\Url::to(['product/' . $action, 'id' => $data->id]);
                        }
                    ],
                    [
                        'label' => '',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a(
                                'Изменить',
                                '#',
                                [
                                    'data-target' => '#UpdateProduct',
                                    'data-toggle' => 'modal',
                                    'class' => 'update-product',
                                    'data-product-id' => $data->id,
                                ]
                            );
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>


