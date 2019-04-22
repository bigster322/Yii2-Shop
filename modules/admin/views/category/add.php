<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['category/add']),
    'method' => 'get',
]); ?>
    <?= $form->field($category, 'name'); ?>
    <?= $form->field($category, 'parent_id')->dropDownList($category->getCategoriesMap()); ?>
    <?= $form->field($category, 'keywords'); ?>
    <?= $form->field($category, 'description'); ?>
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-danger']) ?>
<?php ActiveForm::end(); ?>
