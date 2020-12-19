<?php

namespace app\modules\api\controllers;

use Yii;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

abstract class BaseController extends ActiveController
{
    public $modelClass = '';
    public $serializer = [
        'class' => 'app\api\ApiSerializer'
    ];

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
                'cors'  => Yii::$app->params['apiCorsOptions'],
            ],
        ]);
    }

    /**
     * {@inheritDoc}
     */
    protected function verbs()
    {
        return [
            'index' => ['POST'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function actions()
    {
        return [];
    }
}
