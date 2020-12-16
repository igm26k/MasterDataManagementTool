<?php

use app\models\dictionary\DictionaryCategory;
use app\models\dictionary\DictionaryMeta;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\dictionary\DictionaryMetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dictionary Metas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-meta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dictionary Meta'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'dictionaryId',
            'name',
            [
                'label' => DictionaryMeta::label('categoryId'),
                'value' => function ($model) {
                    $name = DictionaryCategory::nameById($model->categoryId);

                    return $name ? $name : 'Без категории';
                },
            ],
            'route',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
