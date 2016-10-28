<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 user-index">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?> <sup><?= $dataProvider->getCount() ?></sup></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'surname',
                    'address',
                    'email:email',
                    // 'password',
                     'balance',
                    [
                        'attribute'=>'reg_date',
                        'label'=>'Дата регистрации',
                        'content'=>function($data){
                            return date('d-m-Y H:i:s',$data->reg_date);
                        }
                    ],
                    'access',
                    // 'authKey',
                    // 'accessToken',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>