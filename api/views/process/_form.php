<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\process\Process */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="process-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'processId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'trigger')->textarea(['value' => Json::encode($model->trigger, JSON_UNESCAPED_UNICODE)]) ?>

    <?= $form->field($model, 'condition')->textarea(['value' => Json::encode($model->condition, JSON_UNESCAPED_UNICODE)]) ?>

    <?= $form->field($model, 'process')->textarea(['value' => Json::encode($model->process, JSON_UNESCAPED_UNICODE)]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
