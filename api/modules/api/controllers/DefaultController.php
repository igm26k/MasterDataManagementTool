<?php

namespace app\modules\api\controllers;

use app\api\exceptions\ApiErrorException;
use app\models\dictionary\DictionaryMeta;
use app\models\dictionary\DictionaryValue;
use app\models\menu\Menu;
use Yii;

/**
 * Default controller for the `api` module
 */
class DefaultController extends BaseController
{
    public function actionIndex()
    {
    }

    /**
     * @return array
     * @throws \yii\mongodb\Exception
     */
    public function actionMenu()
    {
        return Menu::items();
    }

    /**
     * @return array
     */
    public function actionDictionary()
    {
        $dictionaryRoute = '/' . Yii::$app->request->post('dictionaryRoute');
        $headersAndFields = DictionaryMeta::headersAndFields($dictionaryRoute);

        return [
            'headers' => $headersAndFields['headers'],
            'fields'  => $headersAndFields['fields'],
        ];
    }

    public function actionDictionarySave()
    {
        $dictionaryRoute = '/' . Yii::$app->request->post('dictionaryRoute');
        $item = Yii::$app->request->post('item');
        $dictionaryMeta = DictionaryMeta::find()->byRoute($dictionaryRoute)->one();

        throw new ApiErrorException('test');

        return $item;

        if (!$dictionaryMeta) {
            throw new ApiErrorException('DictionaryMeta not found by route ' . $dictionaryRoute);
        }

        if (!isset($item['_id'])) {
            $model = new DictionaryValue();
            $model->dictionaryId = $dictionaryMeta->dictionaryId;
        }
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            return ['exception' => $exception];
        }
    }
}
