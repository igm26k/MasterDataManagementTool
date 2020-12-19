<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryCategory */

$this->title = Yii::t('app', 'Create Dictionary Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionary Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
