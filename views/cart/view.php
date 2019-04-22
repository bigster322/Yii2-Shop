<?php
use app\models\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\CartService;

$cart = CartService::getCart();
?>
    <?php if ($cart->products) : ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">Наиминование</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Цена</th>
                    <th scope="col"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart->products as $id => $product) : ?>
                        <tr>
                            <td><?= Html::img("@web/images/products/{$product['img']}", ['height' => 150]) ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['qty'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Итог: </td>
                        <td><?= $cart->qty ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">На сумму: </td>
                        <td><?= $cart->sum ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>