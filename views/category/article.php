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

                </div>
            </div>

            <div class="row padding-right">
                <div class="col-md-2">
                    <?= Html::img('@web/'.$article->getImage()->getPathToOrigin(), ['class' => 'img-responsive']);?>
                </div>
                <div class="col-md-6">
                    <h4><?= $article->name ?></h4>
                    <p><?= $article->text ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
