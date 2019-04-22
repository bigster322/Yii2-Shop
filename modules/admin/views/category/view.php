<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$categoryMap = $category->getCategoriesMap();
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Parent category</th>
        <th scope="col">Keywords</th>
        <th scope="col">description</th>
        <th scope="col">Change</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $id => $value) : ?>
        <tr>
            <th scope="row"><?= $value->id ?></th>
            <td><?= $value->name ?></td>
            <td><?= $value->parent_id ? $categoryMap[$value->parent_id] : 'Без категории' ?></td>
            <td><?= $value->keywords ?></td>
            <td><?= $value->description ?></td>
            <td><a href="<?= Url::to(['category/change', 'id' => $value->id]) ?>">Change</a></td>
            <td><a href="<?= Url::to(['category/delete', 'id' => $value->id]) ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['category/add', 'id' => 1]),
]); ?>
    <?= $form->field($category, 'name'); ?>
    <?= $form->field($category, 'parent_id')->dropDownList($category->getCategoriesMap()); ?>
    <?= $form->field($category, 'keywords'); ?>
    <?= $form->field($category, 'description'); ?>
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-default']) ?>
<?php ActiveForm::end(); ?>