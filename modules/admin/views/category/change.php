<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


?>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['category/update', 'id' => $category->id]),
]); ?>
    <?= $form->field($category, 'name'); ?>
    <?= $form->field($category, 'parent_id')->dropDownList($categories->getCategoriesMap()); ?>
    <?= $form->field($category, 'keywords'); ?>
    <?= $form->field($category, 'description'); ?>
    <?= Html::submitButton('Изменить', ['class' => 'btn btn-danger']) ?>
<?php ActiveForm::end(); ?>
