<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['order/update', 'id' => $order->id]),
]); ?>
    <?= $form->field($order, 'name'); ?>
    <?= $form->field($order, 'email'); ?>
    <?= $form->field($order, 'phone'); ?>
    <?= $form->field($order, 'address'); ?>
    <?= $form->field($order, 'status'); ?>
    <?= $form->field($order, 'qty'); ?>
    <?= $form->field($order, 'sum'); ?>
    <?= Html::submitButton('Изменить', ['class' => 'btn btn-danger']) ?>
<?php ActiveForm::end(); ?>
