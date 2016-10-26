<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 15:09
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $quantity = 1)
    {
        //$_SESSION, т.к. в yii сессиях нельзя изменять отедльный элемент сессии, только всю целиком
        //$session->open() Уже сделали в контроллере
        if (isset($_SESSION['cart'][$product->id])) {
            //Если товар уже был в корзине, то просто прибавляем колличество
            $_SESSION['cart'][$product->id]['quantity'] += $quantity;
        } else {
            //Добавляем товар в сессию корзины
            $_SESSION['cart'][$product->id] = [
                'id' => $product->id,
                'quantity' => $quantity,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        //Если итоговое кол-во уже есть (товары были добавлены ранее)
        if (isset($_SESSION['cart.quantity'])) {
            $_SESSION['cart.quantity'] = $_SESSION['cart.quantity'] + $quantity;
        } else {
            $_SESSION['cart.quantity'] = $quantity;
        }

        //Если итоговая сумма уже есть (товары были добавлены ранее)
        if (isset($_SESSION['cart.total'])) {
            $_SESSION['cart.total'] = $_SESSION['cart.total'] + $quantity * $product->price;
        } else {
            $_SESSION['cart.total'] = $quantity * $product->price;
        }
    }

    public function quantityRefresh($id, $method)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        switch ($method) {
            case 'plus': {
                $_SESSION['cart'][$id]['quantity'] += 1;
                $_SESSION['cart.quantity'] += 1;
                $_SESSION['cart.total'] += $_SESSION['cart'][$id]['price'];
                break;
            }
            case 'minus': {
                if($_SESSION['cart'][$id]['quantity'] == 1)
                {
                    return false;
                }
                $_SESSION['cart'][$id]['quantity'] -= 1;
                $_SESSION['cart.quantity'] -= 1;
                $_SESSION['cart.total'] -= $_SESSION['cart'][$id]['price'];
                break;
            }
        }
        return true;
    }

    public function refresh($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $quantityToDelete = $_SESSION['cart'][$id]['quantity'];
        $totalToDelete = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];

        $_SESSION['cart.quantity'] -= $quantityToDelete;
        $_SESSION['cart.total'] -= $totalToDelete;

        unset($_SESSION['cart'][$id]);
        return true;
    }
}