<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= Html::encode($this->title) ?></title>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <?php if(Yii::$app->user->identity['access'] == 1): ?>
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="<?= Url::to(['/admin']) ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Админ-панель</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="admin-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= Url::to(['/admin/product']) ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                <li><a href="<?= Url::to(['/admin/user']) ?>"><i class="fa fa-users" aria-hidden="true"></i></a></li>
                                <li><a href="<?= Url::to(['/admin/category']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                                <li><a href="<?= Url::to(['/admin/manufacturer']) ?>"><i class="fa fa-glass" aria-hidden="true"></i></a></li>
                                <li><a href="<?= Url::to(['/admin/order']) ?>"><i class="fa fa-money" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
    <?php endif; ?>

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?= Url::home(); ?>"><?= Html::img("@web/images/home/logo.png") ?></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(!Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-user"></i> Выход (<?= Yii::$app->user->identity['email'] ?>)</a></li>
                            <?php endif; ?>
                            <li><a href="<?= Url::to(['/cart/checkout']) ?>"><i class="fa fa-crosshairs"></i> Оформление заказа</a></li>
                            <li><a href="<?= Url::to(['/cart']) ?>"><i class="fa fa-shopping-cart">
                                    </i> Корзина <?= ($_SESSION['cart.quantity']) ? '<span class="cart_quantity_header">'. $_SESSION['cart.quantity'] .'</span>' : '' ?> </a></li>
                            <li><a href="<?= Url::to(['/admin']) ?>"><i class="fa fa-lock"></i> Админка</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!--<div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content ?>

<footer id="footer">

    

</footer>

<div class="test">

</div>

<?php $this->endBody() ?>
<script id="dsq-count-scr" src="//crtshop.disqus.com/count.js" async></script>
</body>
</html>
<?php $this->endPage() ?>
