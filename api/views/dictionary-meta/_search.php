<?php

use app\models\dictionary\DictionaryCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryMetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionary-meta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, '_id') ?>
    <?= $form->field($model, 'dictionaryId') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'categoryId')
        ->dropDownList(array_merge([null => 'Без категории'], DictionaryCategory::listAsOptions())) ?>
    <?= $form->field($model, 'route') ?>
    <?= $form->field($model, 'columns') ?>
    <?= $form->field($model, 'rules') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
