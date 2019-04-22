<?php
use yii\helpers\Url;
?>

<table class="table">
    <tbody>
    <tr>
        <th scope="row">ID</th>
        <td><?= $order->id ?></td>
    </tr>
    <tr>
        <th scope="row">Имя</th>
        <td><?= $order->name ?></td>
    </tr>
    <tr>
        <th scope="row">Мобила</th>
        <td><?= $order->phone ?></td>
    </tr>
    <tr>
        <th scope="row">Мыло</th>
        <td><?= $order->email ?></td>
    </tr>
    <tr>
        <th scope="row">Дата создания</th>
        <td><?= $order->created_at ?></td>
    </tr>
    <tr>
        <th scope="row">Дата обновления</th>
        <td><?= $order->updated_at ?></td>
    </tr>
    <tr>
        <th scope="row">Адрес</th>
        <td><?= $order->address ?></td>
    </tr>
    <tr>
        <th scope="row">Кол-во товаров</th>
        <td><?= $order->qty ?></td>
    </tr>
    </tbody>
</table>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Список передачек заключенного</th>
    </tr>
    <tr>
        <td>Название</td>
        <td>Цена товара</td>
        <td>Кол-во</td>
        <td>Общая сумма</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($order->orderItems as $item) : ?>
        <tr>
            <th scope="row"><a href="<?= Url::to(['/product/view', 'id' => $item->product_id]) ?>"><?= $item->name ?></a></th>
            <td><?= $item->price ?></td>
            <td><?= $item->qty_item ?></td>
            <td><?= $item->sum_item ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
