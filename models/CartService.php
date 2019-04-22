<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Cart;
use app\models\CartStruct;


class CartService {

    public static function getCart() {
        return new CartStruct();
    }

    public static function deleteFromCart($id) {
        if (isset($_SESSION['cart'][$id])) {
            if (isset($_SESSION['cart.qty']) && isset($_SESSION['cart.sum'])) {
                $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
                $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
            }
            unset($_SESSION['cart'][$id]);
            return true;
        } else return false;
    }

    public static function clear() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);

        return true;
    }

    public static function addToCart($product, $qty = 1) {
        $cartAdd = new Cart();
        $cartAdd->addToCart($product, $qty);
    }

}