<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryMeta */

$this->title = Yii::t('app', 'Update Dictionary Meta: {name}', [
    'name' => $model->_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionary Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dictionary-meta-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
