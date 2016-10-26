<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Product;

?>

<?php if (!empty($_SESSION['cart'])): ?>
    <div class="cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <td class="image">Фото</td>
                <td class="name">Наименование</td>
                <td class="price">Цена</td>
                <td class="quantity">Кол-во</td>
                <td class="total">Итого</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td class="cart_product">
                        <a href="<?= Url::to(['/products/view/', 'id' => $item['id']]) ?>">
                            <?= Html::img('@web/'.Product::findOne($item['id'])->getImage()->getPath('80x80'), ['alt' => $item->name, 'class' => 'cart-img']) ?>
                        </a>
                    </td>
                    <td class="cart_description">
                        <h4>
                            <a href="<?= Url::to(['/products/view/', 'id' => $item['id']]) ?>"><?= $item['name'] ?></a>
                        </h4>
                        <p>ID: <?= $item['id'] ?></p>
                    </td>
                    <td class="cart_price">
                        <p>$<?= $item['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_down" href="" data-position-id="<?= $item['id'] ?>"> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity"
                                   value="<?= $item['quantity'] ?>"
                                   autocomplete="off" size="2">
                            <a class="cart_quantity_up" href="" data-position-id="<?= $item['id'] ?>"> + </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$<?= $item['quantity'] * $item['price'] ?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete delete-item" href="" data-id="<?= $id ?>"><i
                                class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-info col-md-12 text-right">
            <h2>Итого: <?= $session['cart.total'] ?></h2>
            <p class="small"><?= $session['cart.quantity'] ?> позиций</p>
        </div>

        <div class="cart-action text-right col-md-12">
            <button type="button" class="btn btn-default btn-lg clear-cart">Очистить корзину</button>
            <a href="<?= Url::to(['cart/checkout']) ?>" class="btn btn-primary btn-lg">Оформить заказ</a>
        </div>
    </div>
<?php else: ?>
    <div class="cart-empty col-md-12">
        <h3>Корзина пуста</h3>
    </div>

<?php endif; ?>