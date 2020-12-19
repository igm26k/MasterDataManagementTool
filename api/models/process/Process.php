<?php

namespace app\models\process;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for collection "Process".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $processId
 * @property mixed $name
 * @property mixed $trigger
 * @property mixed $condition
 * @property mixed $process
 */
class Process extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'Process';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'processId',
            'name',
            'trigger',
            'condition',
            'process',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['processId', 'name', 'trigger', 'condition', 'process'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'       => Yii::t('app', 'ID'),
            'processId' => Yii::t('app', 'Process ID'),
            'name'      => Yii::t('app', 'Name'),
            'trigger'   => Yii::t('app', 'Trigger'),
            'condition' => Yii::t('app', 'Condition'),
            'process'   => Yii::t('app', 'Process'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->trigger = Json::decode($this->trigger);
        $this->condition = Json::decode($this->condition);
        $this->process = Json::decode($this->process);

        return parent::beforeSave($insert);
    }
}
