<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>

<section id="checkout">
    <div class="container">
        <div class="row">
            <h2 class="title">Оформление заказа</h2>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert-danger"><?= Yii::$app->session->getFlash('error'); ?></div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['cart'])): ?>
                <div class="col-md-5">

                    <?php $form = ActiveForm::begin() ?>
                    <?= $form->field($order, 'name') ?>
                    <?= $form->field($order, 'email') ?>
                    <?= $form->field($order, 'phone') ?>
                    <?= $form->field($order, 'address') ?>
                    <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end() ?>

                </div>

            <?php else: ?>
                <div class="cart-empty col-md-12">
                    <h3>Нечего оформлять</h3>
                </div>
            <?php endif; ?>
        </div>
</section>
