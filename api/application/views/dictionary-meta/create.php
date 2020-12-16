<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryMeta */

$this->title = Yii::t('app', 'Create Dictionary Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionary Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-meta-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
