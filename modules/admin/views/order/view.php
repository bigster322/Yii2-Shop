<?php
use yii\helpers\Url;
?>

<table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Order page</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($orders as $id => $order) : ?>
        <tr>
            <th scope="row"><?= $id ?></th>
            <td><?= $order->id ?></td>
            <td><?= $order->name ?></td>
            <td><?= $order->email ?></td>
            <td><?= $order->phone ?></td>
            <td><?= $order->created_at ?></td>
            <td><?= $order->status ?></td>
            <td><a href="<?= Url::to(['order/page', 'id' => $id]) ?>">link</a></td>
            <td><a href="<?= Url::to(['order/change', 'id' => $id]) ?>">Change</a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>