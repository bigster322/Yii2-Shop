<?php
/**
 * Created by PhpStorm.
 * User: Mizantrap
 * Date: 18.03.2019
 * Time: 12:33
 */

namespace app\modules\admin\controllers;


use app\models\Order;
use Yii;

class OrderController extends AppAdminController {

    public function actionView() {
        $orders = Order::find()->indexBy('id')->all();

        return $this->render('view', ['orders' => $orders]);
    }

    public function actionPage($id) {
        $order = Order::findOne($id);

        return $this->render('page', ['order' => $order]);
    }

    public function actionChange($id) {
        $order = Order::findOne($id);

        return $this->render('change', ['order' => $order]);
    }

    public function actionUpdate($id) {
        $order = Order::findOne($id);

        if ($order->load(Yii::$app->request->post()) && $order->update()) {
            return $this->redirect(['change', 'id' => $order->id]);
        }
    }
}