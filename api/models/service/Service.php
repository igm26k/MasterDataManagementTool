<?php

namespace app\models\service;

use MongoDB\BSON\ObjectID;
use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "Service".
 *
 * @property ObjectID|string $_id
 * @property mixed $serviceId
 * @property mixed $className
 * @property mixed $description
 */
class Service extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'Service';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'serviceId',
            'className',
            'description',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serviceId', 'className', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'         => Yii::t('app', 'ID'),
            'serviceId'   => Yii::t('app', 'Service ID'),
            'className'   => Yii::t('app', 'Class Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
