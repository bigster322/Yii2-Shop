<?php
/**
 * Created by PhpStorm.
 * User: Mizantrap
 * Date: 04.03.2019
 * Time: 17:56
 */

namespace app\models;


class CartStruct {
    public $products;
    public $qty;
    public $sum;

    function __construct() {
        if (isset($_SESSION['cart'])) {
            $this->products = $_SESSION['cart'];
            $this->qty = $_SESSION['cart.qty'];
            $this->sum = $_SESSION['cart.sum'];
        } else {
            $this->products = null;
            $this->qty = null;
            $this->sum = null;
        }
    }
}