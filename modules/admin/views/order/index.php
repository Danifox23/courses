<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-12 order-index">
    <div class="card">
        <div class="header">
            <h4 class="title">Заказы</h4>
            <p class="model-desc">Список последних заказов</p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'user_id',
                        'format'=>'text',
                        'content'=>function($data){
                            return $data->user->name .' <span class="text-muted"> ('. $data->user->id .')</span>';
                        }
                    ],
                    'name',
                    'email:email',
                    'phone',
                    'address',
                    'total',
                    'quantity',
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('H:i:s',$data->date) .'">'. date('d-m-Y',$data->date) .'</span>';
                        }
                    ],
//                    'date_edit',
                    [
                        'attribute'=>'status_id',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('d-m-Y (H:i:s)',$data->date_edit) .'" class="order-status '. $data->status->color .'">'.$data->status->name.'</span>';
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>