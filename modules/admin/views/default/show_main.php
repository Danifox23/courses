<?php
use yii\helpers\Url;
?>

<div class="card">
    <div class="header">
        <h4 class="title">Товары на главной</h4>
        <p class="model-desc">Показано <?= count($show_main) ?> из 10</p>
    </div>
    <div class="content">
        <?php if(count($show_main)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($show_main as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><a href="<?= Url::to(['product/view/', 'id' => $item->id]) ?>"><?= $item->name ?></a></td>
                        <td><?= $item->category->name ?></td>
                        <td><?= $item->price ?></td>
                        <td data-product-id="<?= $item->id ?>" class="table-actions delete-from-main"><i class="fa fa-times" aria-hidden="true"></i></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h5>Таких товаров нет</h5>
        <?php endif; ?>
    </div>
</div>
