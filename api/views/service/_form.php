<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\service\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serviceId') ?>

    <?= $form->field($model, 'className') ?>

    <?= $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
