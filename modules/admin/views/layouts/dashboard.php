<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\models\Product;

AdminAsset::register($this);
?>

<?php $this->beginPage() ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <?= Html::csrfMetaTags() ?>

        <title>CrtShop | Admin-panel</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
        <meta name="viewport" content="width=device-width"/>

        <!--  Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&subset=cyrillic" rel="stylesheet">

        <?php $this->head() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <!--
                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        CrtShop
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="<?= Url::to(['/admin/']) ?>">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['order/']) ?>">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <p>Заказы</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['product/']) ?>">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                            <p>Товары</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['category/']) ?>">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <p>Категории</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['manufacturer/']) ?>">
                            <i class="fa fa-glass" aria-hidden="true"></i>
                            <p>Производители</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['user/']) ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['status/']) ?>">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                            <p>Статусы</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['blog/']) ?>">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <p>Блог</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">На главную</a>
                    </div>

                </div>
            </nav>


            <div class="content">
                <div class="col-md-12">
                    <div class="card">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                </div>
                <?= $content ?>
            </div>
        </div>


        <!--        <footer class="footer">-->
        <!--            <div class="container-fluid">-->
        <!--                <nav class="pull-left">-->
        <!--                    <ul>-->
        <!---->
        <!--                        <li>-->
        <!--                            <a href="http://www.creative-tim.com">-->
        <!--                                Creative Tim-->
        <!--                            </a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="http://blog.creative-tim.com">-->
        <!--                                Blog-->
        <!--                            </a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="http://www.creative-tim.com/license">-->
        <!--                                Licenses-->
        <!--                            </a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </nav>-->
        <!--                <div class="copyright pull-right">-->
        <!--                    &copy;-->
        <!--                    <script>document.write(new Date().getFullYear())</script>-->
        <!--                    , made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative-->
        <!--                        Tim</a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </footer>-->

    </div>

    <!--modal-->
    <div class="modal fade" id="UpdateProduct" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <?php Pjax::begin(); ?>
                <div class="modal-body">

                    <i class="fa fa-refresh fa-spin fa-3x fa-fw center-block"></i>

                    <?php if (isset($product_m)): ?>
                        <?= $this->render('@app/modules/admin/views/product/_form', [
                            'model' => $product_m,
                        ]);
                        ?>
                    <?php endif; ?>

                </div>
                <?php Pjax::end(); ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit-modal">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>