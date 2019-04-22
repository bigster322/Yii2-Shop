<?php
use app\models\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\CartService;
use yii\widgets\ActiveForm;

$cart = CartService::getCart();
?>
<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if ($cart->products) : ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фото</th>
                <th scope="col">Наиминование</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Цена</th>
                <th scope="col">Сумма</th>
                <th scope="col"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart->products as $id => $product) : ?>
                <tr>
                    <td><?= Html::img("@web/images/products/{$product['img']}", ['height' => 150]) ?></td>
                    <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $product['name'] ?></a></td>
                    <td><?= $product['qty'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['price'] * $product['qty'] ?></td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5">Итог: </td>
                <td><?= $cart->qty ?></td>
            </tr>
            <tr>
                <td colspan="5">На сумму: </td>
                <td><?= $cart->sum ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr />
    <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name'); ?>
        <?= $form->field($order, 'email'); ?>
        <?= $form->field($order, 'phone'); ?>
        <?= $form->field($order, 'address'); ?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end() ?>
<?php else : ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
</div>
