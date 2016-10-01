<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view" xmlns="http://www.w3.org/1999/html">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'desc',
        ],
    ]) ?>

</div>
<div class="row" style="margin-top: 100px;">
<div class="col-md-6">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <a href="../product/update?id=<?=$product->id?>" <h4><?=$product->name?></h4></a>
            <p class="text-muted"><?=$product->description?></p>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>