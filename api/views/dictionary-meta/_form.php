<?php

use app\models\dictionary\DictionaryCategory;
use app\models\dictionary\DictionaryMeta;
use Igm26k\DynamicInputFields\widget\DynamicInputFields;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryMeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionary-meta-form">
    <?php $form = ActiveForm::begin(['id' => 'dictionaryMetaForm']); ?>
    <?= $form->field($model, 'dictionaryId') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'categoryId')->dropDownList(DictionaryCategory::listAsOptions()) ?>
    <?= $form->field($model, 'route') ?>

    <?php
    $columns = [
        'labels' => [
            Yii::t('app', 'Name'),
            Yii::t('app', 'Type'),
            Yii::t('app', 'Description'),
            Yii::t('app', 'Field Type'),
            Yii::t('app', 'Can Edit'),
            Yii::t('app', 'Show in Table'),
            Yii::t('app', 'Relation Dictionary Id'),
        ],
    ];

    if (!empty($model->columns)) {
        foreach ($model->columns as $index => $column) {
            $columns[] = [
                'inputs' => [
                    ['type' => 'text', 'name' => "DictionaryMeta[columns][:index][name]", 'value' => $column['name']],
                    ['type' => 'text', 'name' => "DictionaryMeta[columns][:index][type]", 'value' => $column['type']],
                    [
                        'type'  => 'text',
                        'name'  => "DictionaryMeta[columns][:index][description]",
                        'value' => $column['description'],
                    ],
                    [
                        'type'  => 'select',
                        'name'  => "DictionaryMeta[columns][:index][fieldType]",
                        'value' => $column['fieldType'],
                        'items' => DictionaryMeta::fieldTypes(),
                    ],
                    [
                        'type'  => 'select',
                        'name'  => "DictionaryMeta[columns][:index][canEdit]",
                        'value' => (int)$column['canEdit'],
                        'items' => [1 => 'Да', 0 => 'Нет'],
                    ],
                    [
                        'type'  => 'select',
                        'name'  => "DictionaryMeta[columns][:index][showInTable]",
                        'value' => (int)$column['showInTable'],
                        'items' => [1 => 'Да', 0 => 'Нет'],
                    ],
                    [
                        'type'  => 'select',
                        'name'  => "DictionaryMeta[columns][:index][relation]",
                        'value' => $column['relation'],
                        'items' => array_merge([0 => 'Нет'], DictionaryMeta::listAsOptions()),
                    ],
                ],
            ];
        }
    } else {
        $columns[] = [
            'inputs' => [
                ['type' => 'text', 'name' => "DictionaryMeta[columns][:index][name]", 'value' => ''],
                ['type' => 'text', 'name' => "DictionaryMeta[columns][:index][type]", 'value' => ''],
                [
                    'type'  => 'text',
                    'name'  => "DictionaryMeta[columns][:index][description]",
                    'value' => '',
                ],
                [
                    'type'  => 'select',
                    'name'  => "DictionaryMeta[columns][:index][fieldType]",
                    'value' => '',
                    'items' => DictionaryMeta::fieldTypes(),
                ],
                [
                    'type'  => 'select',
                    'name'  => "DictionaryMeta[columns][:index][canEdit]",
                    'value' => 1,
                    'items' => [1 => 'Да', 0 => 'Нет'],
                ],
                [
                    'type'  => 'select',
                    'name'  => "DictionaryMeta[columns][:index][showInTable]",
                    'value' => 1,
                    'items' => [1 => 'Да', 0 => 'Нет'],
                ],
                [
                    'type'  => 'select',
                    'name'  => "DictionaryMeta[columns][:index][relation]",
                    'value' => '',
                    'items' => array_merge([0 => 'Нет'], DictionaryMeta::listAsOptions()),
                ],
            ],
        ];
    }
    ?>

    <?= DynamicInputFields::widget([
        'label' => $model->getAttributeLabel('columns'),
        'id'    => 'columnsList',
        'rows'  => $columns,
    ]) ?>

  <div class="form-group">
      <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
$("#dictionaryMetaForm").submit(function (event) {
  difSetIndexes();
});
</script>
