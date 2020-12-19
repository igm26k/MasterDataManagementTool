<?php

use app\models\dictionary\DictionaryCategory;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\dictionary\DictionaryMeta */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionary Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dictionary-meta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            '_id',
            'dictionaryId',
            'name',
            [
                'attribute' => 'categoryId',
                'format'    => 'raw',
                'value'     => function ($data) {
                    return DictionaryCategory::nameById($data->categoryId);
                },
            ],
            'route',
            [
                'attribute' => 'columns',
                'format'    => 'raw',
                'value'     => function ($data) {
                    return Json::encode($data->columns, JSON_UNESCAPED_UNICODE);
                },

            ],
            [
                'attribute' => 'rules',
                'format'    => 'raw',
                'value'     => function ($data) {
                    return Json::encode($data->rules, JSON_UNESCAPED_UNICODE);
                },

            ],
        ],
    ]) ?>

</div>
