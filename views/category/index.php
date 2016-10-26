<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\CategoryWidget;
use app\components\ManufacturerWidget;
use yii\helpers\Url;

?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt=""/>
                                <img src="images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt=""/>
                                <img src="images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt=""/>
                                <img src="images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

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
                <?php if (!empty($show_main_products)): ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title">Популярные товары</h2>
                    <?php foreach ($show_main_products as $show_main_product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?= Html::img('@web/'.$show_main_product->getImage()->getPath('280x250'), ['alt' => $show_main_product->name]) ?>
                                        <h2>$<?= $show_main_product->price ?></h2>
                                        <p>
                                            <a href="<?= Url::to(['product/view', 'id' => $show_main_product->id]) ?>"><?= $show_main_product->name ?></a>
                                        </p>
                                        <a href="<?= Url::to(['cart/add', 'id' => $show_main_product->id]) ?>"
                                           data-id="<?= $show_main_product->id ?>" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>Добавить в корзину
                                        </a>
                                    </div>
                                    <?php if ($show_main_product->sale == 1): ?>
                                        <?= Html::img("@web/images/home/sale.png", ['class' => 'new']) ?>
                                    <?php endif; ?>
                                </div>
                                <!--                                <div class="choose">-->
                                <!--                                    <ul class="nav nav-pills nav-justified">-->
                                <!--                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>-->
                                <!--                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                <!--                                    </ul>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div><!--features_items-->


            </div>
        </div>
    </div>
</section>
