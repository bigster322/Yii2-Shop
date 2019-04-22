<?php

namespace app\controllers;

use app\models\CartService;
use app\models\Product;
use app\models\OrderItems;
use app\models\Order;
use Yii;


class CartController extends AppController {

    public function actionAdd($id) {
        $this->layout = false;
        $this->openSession();

        $qty = (int) Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;

        $product = Product::findOne($id);
        if (!$product) return 'error';

        CartService::addToCart($product, $qty);

        return $this->render('view');
    }

    public function actionView($layout) {
        $this->openSession();

        $layout = (boolean) $layout;
        $this->layout = $layout ? 'main' : false;

        return $this->render('view');
    }

    public function actionClear() {
        $this->openSession();

        CartService::clear();

        $this->layout = false;
        return $this->render('view');
    }

    public function actionDelete($id) {
        $this->openSession();

        CartService::deleteFromCart($id);

        $this->layout = false;
        return $this->render('view');
    }

    public function actionOrder() {
        $this->openSession();
        $this->setMeta('Корзина');

        $cart = CartService::getCart();

        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $cart->qty;
            $order->sum = $cart->sum;
            if ($order->save()) {
                $order->saveOrderItems($cart->products);

//                Yii::$app->mailer->compose('order', ['cart' => $cart])
//                    ->setFrom('kl1nt111@mail.ru')
//                    ->setTo($order->email)
//                    ->setSubject('Заказ №'. $order->id)
//                    ->send();

                Yii::$app->session->setFlash('success', 'Ваш заказ принят в обработку. Менеджер скоро свяжется с вами');
                CartService::clear();
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при оформлении заказа');
            }
        }

        return $this->render('order', ['order' => $order, 'session' => $this->session]);
    }
}