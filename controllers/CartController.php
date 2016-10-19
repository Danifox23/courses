<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 15:07
 */

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\Position;
use app\models\User;
use yii\base\Response;


class CartController extends AppController
{
    public function actionCheckout()
    {
        $session = Yii::$app->session;
        $session->open();

        $order = new Order();
        $user = User::findOne(Yii::$app->user->id);

        if ($order->load(Yii::$app->request->post())) {
            $order->quantity = $session['cart.quantity'];
            $order->total = $session['cart.total'];
            $order->status_id = 1;
            $order->user_id = $user->id;

            if ($order->save()) {
                $this->orderPosition($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Заказ успешно оформлен!');
                $session->remove('cart');
                $session->remove('cart.quantity');
                $session->remove('cart.total');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->metaConstruct('CrtShop | Оформление заказа');

        return $this->render('checkout', [
            'session' => $session,
            'order' => $order,
        ]);
    }

    public function orderPosition($session, $order_id)
    {
        foreach ($session as $id => $position) {
            $order_position = new Position();

            $order_position->order_id = $order_id;
            $order_position->product_id = $id;
            $order_position->name = $position['name'];
            $order_position->price = $position['price'];
            $order_position->quantity = $position['quantity'];
            $order_position->total = $position['quantity'] * $position['price'];
            $order_position->save();
        }
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $quantity = Yii::$app->request->get('quantity');
        if (!$quantity) {
            $quantity = 1;
        }

        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $quantity);

//        return $_SESSION['cart.quantity'];
        return true;
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.quantity');
        $session->remove('cart.total');

        return true;
    }

    public function actionDeleteItem()
    {
        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->refresh($id);

        return $this->render('index', [
            'session' => $session,
        ]);
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();

        return $this->render('index', [
            'session' => $session,
        ]);
    }
}

