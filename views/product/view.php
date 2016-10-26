<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\components\CategoryWidget;
use app\components\ManufacturerWidget;
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?= Html::img('@web/'.$product->getImage()->getPathtoOrigin(), ['alt' => $product->name, 'class' => 'img-responsive']) ?>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <?php if ($product->sale == 1): ?>
                                <?= Html::img("@web/images/home/sale.png", ['class' => 'new']) ?>
                            <?php endif; ?>
                            <h2><?= $product->name ?></h2>
                            <p>ID: <?= $product->id ?></p>
                            <h3 class="product-price">US $<?= $product->price ?></h3>
                            <p class="product-desc"><?= $product->description ?></p>

                            <label>Колличество:</label>
                            <input type="text" value="1" class="product-quantity-input"/>
                            <a class="btn btn-fefault cart add-to-cart" data-id="<?= $product->id ?>" href="#">
                                <i class="fa fa-shopping-cart"></i>
                                Добавить в корзину
                            </a>

                            <hr/>

                            <p><b>Производитель:</b> <?= $product->manufacturer->name ?></p>
                            <p><b>Категория:</b> <?= $product->category->name ?></p>

                        </div><!--/product-information-->
                    </div>

                    <div class="product-comments col-md-12">
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
                            /*
                             var disqus_config = function () {
                             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                             };
                             */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = '//crtshop.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                    </div>

                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>
