<?php

use app\models\dictionary\DictionaryMeta;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\menu\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'dictionaryId')->dropDownList(DictionaryMeta::listAsOptions()) ?>
    <?= $form->field($model, 'active')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
