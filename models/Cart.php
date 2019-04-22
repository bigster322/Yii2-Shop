<?php

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    private $product;
    private $qty;

    public function behaviors() {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToCart($product, $qty) {
        $this->initProd($product, $qty);

        if ($this->isHaveProd()) {
            $this->addQty();
        } else {
            $this->addProduct();
        }

        $this->updateTotalInfo();
    }

    private function isHaveProd() {
        return isset($_SESSION['cart'][$this->product->id]);
    }

    private function addQty() {
        $_SESSION['cart'][$this->product->id]['qty'] += $this->qty;
    }

    private function addProduct() {
        $_SESSION['cart'][$this->product->id] = [
            'qty' => $this->qty,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'img' => $this->product->img,
        ];
    }

    private function updateTotalInfo() {
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $this->qty : $this->qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $this->product->price * $this->qty : $this->product->price * $this->qty;
    }

    private function initProd($product, $qty) {
        $this->qty = $qty;
        $this->product = $product;
    }
}
