<?php

namespace app\models\dictionary;

use MongoDB\BSON\ObjectID;
use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "DictionaryMeta".
 *
 * @property ObjectID|string $_id
 * @property mixed $dictionaryId
 */
class DictionaryValue extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['MDMToolMongo', 'DictionaryValue'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'dictionaryId',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dictionaryId', 'columns'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'          => Yii::t('app', 'ID'),
            'dictionaryId' => Yii::t('app', 'Dictionary ID'),
            'columns'      => Yii::t('app', 'Columns'),
        ];
    }
}