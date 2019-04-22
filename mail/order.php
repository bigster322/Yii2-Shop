<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Наиминование</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Цена</th>
            <th scope="col">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart->products as $id => $product) : ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['qty'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['price'] * $product['qty'] ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Итог: </td>
            <td><?= $cart->qty ?></td>
        </tr>
        <tr>
            <td colspan="3">На сумму: </td>
            <td><?= $cart->sum ?></td>
        </tr>
        </tbody>
    </table>
</div>
