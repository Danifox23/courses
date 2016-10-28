<?php

use yii\helpers\Url;

?>

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
                    <i class="fa fa-external-link" aria-hidden="true"></i><a href="<?= Url::to(['product/']) ?>"
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
                    <i class="fa fa-external-link" aria-hidden="true"></i><a href="<?= Url::to(['order/']) ?>"
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
                    <i class="fa fa-external-link" aria-hidden="true"></i><a href="<?= Url::to(['order/']) ?>"
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
                        <p>Блог</p>
                        <span><?= count($blog) ?></span>
                    </div>
                </div>
            </div>
            <div class="footer">
                <hr>
                <div class="card-link">
                    <i class="fa fa-external-link" aria-hidden="true"></i><a
                        href="<?= Url::to(['blog/']) ?>"
                        class="text-muted-low">Перейти в
                        блог</a>
                </div>
            </div>
        </div>
    </div>
</div>
