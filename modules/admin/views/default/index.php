<?php

use yii\helpers\Url;

?>

<div class="test">

</div>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">

        <div class="card col-md-12 period-picker">
            <div class="content">
                <p>Показать результаты за:
                    <span class="active-interval" data-period="all"> всё время</span> |
                    <span data-period="year">год</span> |
                    <span data-period="month">месяц</span> |
                    <span data-period="week">неделя</span> |
                    <span data-period="day">день</span>
                </p>
            </div>
        </div>

        <div class="period_ajax">
            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Товары</p>
                                    <span><?= count($products) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['product/']) ?>"
                                    class="text-muted-low">Перейти в
                                    продукты</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Заказы</p>
                                    <span><?= count($orders) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['order/']) ?>"
                                    class="text-muted-low">Перейти в
                                    заказы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Пользователи</p>
                                    <span><?= count($users) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['user/']) ?>"
                                    class="text-muted-low">Перейти в
                                    пользователи</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Пользователи</p>
                                    <span><?= count($orders) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['order/']) ?>"
                                    class="text-muted-low">Перейти в
                                    заказы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 products-on-main">
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
                                <td data-product-id="<?= $item->id ?>" class="table-actions delete-from-main">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <h5>Таких товаров нет</h5>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>