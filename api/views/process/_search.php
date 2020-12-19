<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\process\ProcessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="process-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'processId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'trigger') ?>

    <?= $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'process') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
