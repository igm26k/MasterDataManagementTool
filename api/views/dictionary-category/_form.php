<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionary-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
