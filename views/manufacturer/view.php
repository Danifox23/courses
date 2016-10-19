<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\components\ManufacturerWidget;
use app\components\CategoryWidget;
use yii\helpers\Url;

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="category-products sidebar-list">
                        <?= CategoryWidget::widget(['tpl' => 'list']); ?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Производители</h2>
                        <ul class="manufacturer sidebar-list">
                            <?= ManufacturerWidget::widget(['tpl' => 'list']); ?>
                        </ul>
                    </div><!--/brands_products-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt=""/>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?= $manufacturer->name ?></h2>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/images/products/{$product->image}", ['alt' => $product->name]) ?>
                                            <h2>$<?= $product->price ?></h2>
                                            <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Добавить в корзину
                                            </a>                                        </div>
                                        <?php if ($product->sale == 1): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['class' => 'new']) ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="clearfix"></div>
                        <?= LinkPager::widget(['pagination' => $pages]) ?>

                    <?php else : ?>
                        <h4>В данной категории пока ещё нет товаров :(</h4>
                    <? endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>